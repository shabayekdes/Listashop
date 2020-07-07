<div class="form-group row mt-3">
    <label for="{{ $option->code }}" class="col-sm-4 col-form-label">{{ $option->name }} : </label>
    <div class="col-sm-8">
        <select class="form-control" name="options[{{ $option->id }}][option_value]" id="{{ $option->code }}">
            <option>Select One</option>
            @foreach ($option->values as $value)
            <option value="{{ $value->id }}|{{ $value->value }}">{{ $value->value }}</option>
            @endforeach
        </select>
        <input type="hidden" name="options[{{ $option->id }}][option]" value="{{ $option->id }}|{{ $option->name }}" />
    </div>
</div>
