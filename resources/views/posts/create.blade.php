<form action="/posts" method="POST">
    {{csrf_field()}}
    <h4>Create Post</h4>
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="body">Text</label>
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Create</button>
</form>