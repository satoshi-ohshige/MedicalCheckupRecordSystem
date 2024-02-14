@php
    /** @var \App\ViewModels\MedicalRecordsViewModel $medicalRecordsViewModel */
@endphp

@extends('components.layout')

@section('title', '受診記録一覧')

@section('content')
    <form class="row row-cols-lg-auto g-3 justify-content-end mb-3">
        <div class="col-4">
            <label class="visually-hidden" for="fy">年度</label>
            <select class="form-select" name="fy" id="fy">
                @foreach($medicalRecordsViewModel->getFySelectOptionGenerator() as $fy)
                    <option @if($medicalRecordsViewModel->isSelectedFy($fy)) selected @endif value="{{ $fy }}">{{ $fy }}年度</option>
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-secondary">この年度の一覧を見る</button>
        </div>
    </form>
    <div class="card">
        <div class="card-header">{{ $medicalRecordsViewModel->showFiscalYear() }}年度の受診記録一覧</div>
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
                @foreach($medicalRecordsViewModel->getMedicalRecords() as $medicalRecord)
                    <tr>
                        <td>{{ $medicalRecord->showCheckupDate() }}</td>
                        <td>{{ $medicalRecord->showUserName() }}</td>
                        <td>{{ $medicalRecord->showCheckupCourse() }}</td>
                        <td>{{ $medicalRecord->showCheckupPlace() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
