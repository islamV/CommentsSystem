<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{

    public $commentableType;
    public $commentableId;
    public $body;
    public $editingCommentId;
    public $replyToCommentId;
    public $showCommentForm ;
    public $showComments ;
    public $showReplies ;
  public $commentId;
    public function replyTo($commentId)
    {
        $this->replyToCommentId = $commentId;
    }

    public function cancelReply()
    {
        $this->reset(['replyToCommentId', 'body']);
    }
    public function toggleCommentForm()
    {
        $this->showCommentForm = !$this->showCommentForm;
    }
    public function toggleComments()
    {
        $this->showComments = !$this->showComments;
    }
    public function toggleShowReplies($commentId)
    {
        $this->showReplies = !$this->showReplies;
        $this->commentId = $commentId ;
    }

    public function cancelComment()
    {
        $this->showCommentForm = false;
        $this->reset(['body']);
    }

    public function render()
    {
        $comments = Comment::where('commentable_type', $this->commentableType)
        ->where('commentable_id', $this->commentableId)
        ->whereNull('parent_id') // Only fetch top-level comments
        ->with(['replies'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('livewire.comments', ['comments' => $comments]);
    }

    public function addComment()
    {

        $this->validate(['body' => 'required']);

       $comment = Comment::create([
            'body' => $this->body,
            'commentable_type' => $this->commentableType,
            'commentable_id' => $this->commentableId,
            'user_id' => Auth::user()->id ,
            'parent_id' => $this->replyToCommentId ,
        ]);

        $this->reset(['body', 'replyToCommentId']);
    }

    public function editComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $this->editingCommentId = $comment->id;
        $this->body = $comment->body;
    }

    public function updateComment($commentId)
    {
        $this->validate(['body' => 'required']);
        $comment = Comment::findOrFail($commentId);
        $comment->update(['body' => $this->body]);
        $this->reset(['body', 'editingCommentId']);
    }

    public function deleteComment($commentId)
    {
        Comment::destroy($commentId);
    }
}
