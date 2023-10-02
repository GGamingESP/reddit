<div class="card">
    <div class="card-header">
        <h3>Contribute a link</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="/community">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="What is the title of your article?">
                @error('title')
                    <div class="alert alert-danger">{{ 'Titulo Incorrect' }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link"
                    placeholder="What is the URL?">
                @error('link')
                    <div class="alert alert-danger">{{ "link incorrecto" }}</div>
                @enderror
            </div>

            <div class="form-group pt-3">
                <button class="btn btn-primary">Contribute!</button>
            </div>
        </form>
    </div>
</div>
