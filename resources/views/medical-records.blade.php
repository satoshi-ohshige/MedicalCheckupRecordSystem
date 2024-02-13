@extends('components.layout')

@section('title', '受診記録一覧')

@section('content')
    <form class="row row-cols-lg-auto g-3 justify-content-end mb-3">
        <div class="col-4">
            <label class="visually-hidden" for="fy">年度</label>
            <select class="form-select" name="fy" id="fy">
                <option selected value="2023">2023年度</option>
                <option value="2022">2022年度</option>
                <option value="2021">2021年度</option>
                <option value="2020">2020年度</option>
                <option value="2019">2019年度</option>
            </select>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-secondary">この年度の一覧を見る</button>
        </div>
    </form>
    <div class="card">
        <div class="card-header">ユーザー詳細</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">受診日</th>
                    <th scope="col">受診したユーザー</th>
                    <th scope="col">受診コース</th>
                    <th scope="col">受診場所</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2023-10-13</td>
                    <td>島田直樹</td>
                    <td>基本健診</td>
                    <td>東京都練馬区</td>
                </tr>
                <tr>
                    <td>2024-01-02</td>
                    <td>山口貴志</td>
                    <td>1日人間ドック</td>
                    <td>東京都新宿区</td>
                </tr>
                <tr>
                    <td>2024-01-28</td>
                    <td>北野大輔</td>
                    <td>1日人間ドック</td>
                    <td>埼玉県さいたま市</td>
                </tr>
                <tr>
                    <td>2023-08-22</td>
                    <td>横山麻衣子</td>
                    <td>1日人間ドック</td>
                    <td>神奈川県横須賀市</td>
                </tr>
                <tr>
                    <td>2023-05-12</td>
                    <td>岡美樹</td>
                    <td>1日人間ドック</td>
                    <td>東京都八王子</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
