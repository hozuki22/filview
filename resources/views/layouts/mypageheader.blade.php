<div class="mypage_header">
    <!-- 検索窓の作成 -->
    <div class="input-group">
        <input type="text" class="form-control" placeholder="キーワードを入力">
        <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
    </div>
    <!-- mypageメニュー -->
    <div id="mypage-card" class="card">
        <div id="mypage_body" class="card-body">
            <div class="user_icon">
                <img src="" alt="ユーザーアイコン">
            </div>
            <div class="mypage_user
            ">
                <p class="mypage_username">{{ $login_user->user_name }}</p>
            </div>
            <div class="my_profile">
                <a href="{{ route('userprofile',$login_user->id) }}"><button type="button" class="btn btn-primary">プロフィール編集</button></a>
            </div>
        </div>
    </div>
    <div id="mypage_menu_link">
        <a href=""><button type="button" class="btn btn-primary btn-lg">視聴済みリスト</button></a>
        <a href="{{ route('wanttosee.index') }}"><button type="button" class="btn btn-primary btn-lg">見たいリスト</button></a>
        <a href="{{ route('follow.index') }}"><button type="button" class="btn btn-primary btn-lg">フォロー中</button></a>
        <a href="{{ route('follower.index') }}"><button type="button" class="btn btn-primary btn-lg">フォロワー</button></a>
    </div>
</div>

