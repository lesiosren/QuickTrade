<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CreateAnnouncement extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;

    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $image;

    public $form_id;
    public $announcement;


    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'image|max:5000',
        'temporary_images.*' => 'image|max:5000',
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute deve essere un numero',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di 5mb',
        'images.image' => 'L\'immagine deve essere un\'immagine',
        'images.max' => 'L\'immagine deve essere massimo di 5mb',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
{
    $this->validate();

    $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
    if (count($this->images)) {
        foreach ($this->images as $image) {
            $newFileName = "announcements/{$this->announcement->id}";
            $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName,'public')]);

            RemoveFaces::withChain([

                new ResizeImage($newImage->path, 300, 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id),

            ])->dispatch($newImage->id);

        }

        File::deleteDirectory(storage_path('/app/livewire-tmp'));
    }
    $this->announcement->user()->associate(Auth::user());
    $this->announcement->save();
    session()->flash('message', 'Annuncio inserito con successo, sarà pubblicato dopo la revisione');
    $this->clearForm();
}


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function clearForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
