<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Comment;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    public $newComment;
    public $image;
    public $ticketId;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected' => 'ticketSelected',
    ];

    public function handleFileUpload($imageData)
    {
        //dd($imageData);
        $this->image = $imageData;
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:10']);

        $image = $this->storeImage();

        $createdComment = Comment::create([

            'body' => $this->newComment, 
            'user_id' => 1,
            'image' => $image,
            'support_ticket_id' => $this->ticketId

        ]);

        $this->newComment = "";
        
        $this->image = "";

        session()->flash('message', 'Comment added ssuccessfully ');
        
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:10']);
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);

        Storage::disk('public')->delete($comment->image);

        $comment->delete();

        session()->flash('message', 'Comment delected ssuccessfully ');

    }

    public function storeImage()
    {
        if(!$this->image){
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');

        $name = Str::random() . '.jpg';

        Storage::disk('public')->put($name, $img);

        return $name;
    }

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }

    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(2)
        ]);
    }

}
