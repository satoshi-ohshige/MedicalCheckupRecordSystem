<header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <span class="fs-4">受診記録システム</span>
        </a>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('users') }}">ユーザー一覧</a>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('medical-records') }}">受診記録一覧</a>
            <a class="py-2 btn btn-sm btn-outline-secondary" href="{{ route('sign-up') }}">ユーザー登録</a>
        </nav>
    </div>
</header>
