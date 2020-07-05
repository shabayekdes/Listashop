<div class="form-group row mt-3">
    <label for="{{ $option->option->key }}" class="col-sm-4 col-form-label">{{ $option->option->name }} : </label>
    <div class="col-sm-8">
        <select class="form-control" id="{{ $option->option->key }}">
            <option>Select One</option>
            @foreach ($option->values as $value)
            <option value="{{ $value->id }}">{{ $value->value }}</option>
            @endforeach
        </select>
    </div>
</div>
