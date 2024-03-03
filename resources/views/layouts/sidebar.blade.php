<div class="list-group">
    <h4>店舗検索</h4>
    <form action="/search" method="GET">
        <input type="text" name="keyword" placeholder="店舗を検索">
        <span class="input-group-btn">
            <button class="btn btn-success btn-sm" type="submit">検索<i class="fa-solid fa-magnifying-glass fa-lg ms-1"></i></button>
        </span>
        <div class="w-100"></div>
        <div class="mt-3">
            <select name="category">
                <option value="">カテゴリーが未選択</option>
                @foreach($categories as $category)  
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </form>
        </div>
    </form>
</div>