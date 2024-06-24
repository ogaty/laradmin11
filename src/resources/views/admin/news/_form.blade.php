<div class="form-field">
    <div>
        <label for="title" class="mainlabel">category</label>
    </div>
    <div>
        <select name="news_category_id" class="form-select">
            <option value="1">AAA</option>
        </select>
    </div>
</div>
<div class="form-field">
    <div>
        <label for="title">title</label>
    </div>
    <div>
        <input type="text" name="title" id="title" class="longtext">
    </div>
</div>
<div class="form-field">
    <div>
        <label for="body">body</label>
        {{ $check }}
    </div>
    <div>
        <textarea name="body" id="body" class="longarea" rows="10"></textarea>
    </div>
</div>
<div>
    <input type="date" name="published_at">
</div>
<div>
    <input type="file" name="img">
</div>
