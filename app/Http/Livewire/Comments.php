<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Comment;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    // public $comments = [
    //     [
    //         'body' => 'adasdsad sdasdasdasd asdasdasdasdasd.',
    //         'created_at' => '3 min ago',
    //         'creator' => 'Iman'
    //     ]

    // ];

    public $newComment;
    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        //dd($imageData);
        $this->image = $imageData;
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:10']);

        $createdComment = Comment::create([

            'body' => $this->newComment, 
            'user_id'=>1

        ]);

        $this->newComment = "";

        session()->flash('message', 'Comment added ssuccessfully ');
        
        // $this->comments[] = [

        //     'body' => 'Hello World.',
        //     'created_at' => '1 min ago',
        //     'creator' => 'Hafiz'

        // ];
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:10']);
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);

        $comment->delete();

        

        session()->flash('message', 'Comment delected ssuccessfully ');

    }

    public function render()
    {
        return view('livewire.comments', [

            'comments' => Comment::latest()->paginate(2)

        ]);
    }

}
