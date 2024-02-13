@extends('components.layout')

@section('title', 'ユーザー登録')

@section('content')
    <div class="card">
        <div class="card-header">ユーザー登録</div>
        <form class="m-3">
            <div class="mb-3 row justify-content-center">
                <label for="name" class="col-2 col-form-label">名前</label>
                <div class="col-5">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="mb-4 row justify-content-center">
                <label for="birthdate" class="col-2 col-form-label">生年月日</label>
                <div class="col-5">
                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                </div>
            </div>
            <div class="d-grid gap-2 col-5 mx-auto">
                <button type="submit" class="btn btn-primary">登録する</button>
            </div>
        </form>
    </div>
@endsection
