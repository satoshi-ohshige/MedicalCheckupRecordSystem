@php
    /** @var \App\ViewModels\UserViewModel $user */
    /** @var \App\ViewModels\MedicalRecordViewModel[] $medicalRecords */
@endphp

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
                    <td>{{ $user->showUserId() }}</td>
                    <td>{{ $user->showName() }}</td>
                    <td>{{ $user->showBirthdate() }}</td>
                    <td>{{ $user->showFiscalAge() }}歳</td>
                    <td>{{ $user->showDefaultCheckupCourse() }}</td>
                    <td><a class="btn btn-sm btn-outline-primary" href="{{ route('create-record', ['userId' => $user->showUserId()]) }}">受診登録</a></td>
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
                @foreach($medicalRecords as $medicalRecord)
                    <tr>
                        <td>{{ $medicalRecord->showCheckupFiscalYear() }}</td>
                        <td>{{ $medicalRecord->showCheckupDate() }}</td>
                        <td>{{ $medicalRecord->showCheckupCourse() }}</td>
                        <td>{{ $medicalRecord->showCheckupPlace() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
