@php
    /** @var \App\ViewModels\UsersItemViewModel[] $users */
@endphp

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
                @foreach($users as $user)
                    <tr>
                        <th scope="row"><a href="{{ route('user-detail', ['userId' => $user->showUserId()]) }}">{{ $user->showUserId() }}</a></th>
                        <td>{{ $user->showName() }}</td>
                        <td>{{ $user->showBirthdate() }}</td>
                        <td>{{ $user->showFiscalAge() }}歳</td>
                        <td>{{ $user->showDefaultCheckupCourse() }}</td>
                        <td>{{ $user->showCheckupCount() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
