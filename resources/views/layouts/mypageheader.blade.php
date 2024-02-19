<div class="mypage_header">
    <!-- 検索窓の作成 -->
    <div class="input-group">
        <input type="text" class="form-control" placeholder="キーワードを入力">
        <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
    </div>
    <!-- mypageメニュー -->
    <div id="mypage_menu">
        <div id=user_icon>
            <img src="" alt="ユーザーアイコン">
        </div>
        <div id="user_id">
            <p>ユーザーネーム</p>
        </div>
        <div id="menu">
            <a href="{{ route('userprofile',$login_user_id) }}">プロフィール編集</a>
        </div>
    </div>
    <div id="mypage_menu_link">
        <a href=""><button type="button" class="btn btn-primary">視聴済みリスト</button></a>
        <a href="{{ route('wanttosee.index') }}"><button type="button" class="btn btn-primary">見たいリスト</button></a>
        <a href="{{ route('follow.index') }}"><button type="button" class="btn btn-primary">フォロー中</button></a>
        <a href="{{ route('follower.index') }}"><button type="button" class="btn btn-primary">フォロワー</button></a>
    </div>
</div>

