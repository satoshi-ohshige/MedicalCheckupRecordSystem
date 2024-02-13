@extends('components.layout')

@section('title', 'ユーザー一覧')

@section('content')
    <div class="card">
        <div class="card-header">ユーザー一覧</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ユーザーID</th>
                    <th scope="col">名前</th>
                    <th scope="col">生年月日</th>
                    <th scope="col">年度年齢</th>
                    <th scope="col">今年度の受診コース</th>
                    <th scope="col">受診回数</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><a href="{{ route('user-detail', ['userId' => 1]) }}">1</a></th>
                    <td>島田直樹</td>
                    <td>1996-04-30</td>
                    <td>27歳</td>
                    <td>基本健診</td>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{ route('user-detail', ['userId' => 2]) }}">2</a></th>
                    <td>山口貴志</td>
                    <td>1986-08-09</td>
                    <td>37歳</td>
                    <td>1日人間ドック</td>
                    <td>12</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{ route('user-detail', ['userId' => 3]) }}">3</a></th>
                    <td>北野大輔</td>
                    <td>1978-07-21</td>
                    <td>45歳</td>
                    <td>1日人間ドック</td>
                    <td>23</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{ route('user-detail', ['userId' => 4]) }}">4</a></th>
                    <td>横山麻衣子</td>
                    <td>1992-01-30</td>
                    <td>32歳</td>
                    <td>基本健診</td>
                    <td>8</td>
                </tr>
                <tr>
                    <th scope="row"><a href="{{ route('user-detail', ['userId' => 5]) }}">5</a></th>
                    <td>岡美樹</td>
                    <td>1984-11-02</td>
                    <td>39歳</td>
                    <td>1日人間ドック</td>
                    <td>2</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
