<div class="form-field">
    <div>
        <label for="title" class="mainlabel">category</label>
    </div>
    <div>
        <select name="news_category_id" class="form-select">
            @foreach ($categories as $key => $category)
                <option value="{{ $key }}" {{ old('news_category_id') == $key ? 'selected' : ($key == $news->news_category_id ? 'selected' : '') }}>{{ $category }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-field">
    <div>
        <label for="title">title</label>
    </div>
    <div>
        <input type="text" name="title" id="title" class="longtext" value="{{ old('title') }}">
    </div>
</div>
<div class="form-field">
    <div>
        <label for="body">body</label>
        {{ $check }}
    </div>
    <div>
        <textarea name="body" id="body" class="longarea" rows="10">{{ old('body') }}</textarea>
    </div>
</div>
<div class="form-field">
    <div>
        <label for="publish">公開時刻</label>
    </div>
    <div>
        {{-- ng value="2024.11.01" --}}
        {{-- ng value="2024/11/01" --}}
        {{-- ng value="2024-11-01 12:00:00" --}}
        {{-- ok value="2024-11-01" --}}
        <input type="date" name="published_at" id="publish" value="2024-11-01">
    </div>
</div>
<div class="form-field">
    <div>
        <label for="thumbnail">Thumbnail</label>
    </div>
    <div>
        <input type="file" name="img" id="thumbnail">
    </div>
</div>
