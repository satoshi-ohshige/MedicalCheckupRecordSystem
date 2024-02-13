@extends('components.layout')

@section('title', 'ユーザー詳細')

@section('content')
    <div class="card">
        <div class="card-header">ユーザー詳細</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ユーザーID</th>
                    <th scope="col">名前</th>
                    <th scope="col">生年月日</th>
                    <th scope="col">年度年齢</th>
                    <th scope="col">今年度の受診コース</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>島田直樹</td>
                    <td>1996-04-30</td>
                    <td>27歳</td>
                    <td>基本健診</td>
                    <td><a class="btn btn-sm btn-outline-primary" href="{{ route('create-record', ['userId' => 1]) }}">受診登録</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">受診記録一覧</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">受診年度</th>
                    <th scope="col">受診日</th>
                    <th scope="col">受診コース</th>
                    <th scope="col">受診場所</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2023</td>
                    <td>2023-10-13</td>
                    <td>基本健診</td>
                    <td>東京都練馬区</td>
                </tr>
                <tr>
                    <td>2022</td>
                    <td>2022-09-22</td>
                    <td>基本健診</td>
                    <td>東京都練馬区</td>
                </tr>
                <tr>
                    <td>2021</td>
                    <td>2021-10-25</td>
                    <td>基本健診</td>
                    <td>東京都新宿区</td>
                </tr>
                <tr>
                    <td>2020</td>
                    <td>2020-08-27</td>
                    <td>基本健診</td>
                    <td>東京都練馬区</td>
                </tr>
                <tr>
                    <td>2019</td>
                    <td>2019-09-21</td>
                    <td>基本健診</td>
                    <td>東京都港区</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
