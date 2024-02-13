@extends('components.layout')

@section('title', '受診記録登録')

@section('content')
    <div class="card">
        <div class="card-header">受診記録登録</div>
        <form class="m-3">
            <div class="mb-3 row justify-content-center">
                <label for="checkupDate" class="col-2 col-form-label">受診日</label>
                <div class="col-5">
                    <input type="date" class="form-control" id="checkupDate" name="checkupDate">
                </div>
            </div>
            <fieldset class="mb-3 row justify-content-center">
                <legend class="col-form-label col-2">受診コース</legend>
                <div class="col-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="course" id="basic" value="basic" checked>
                        <label class="form-check-label" for="basic">
                            基本検診
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="course" id="complete" value="complete">
                        <label class="form-check-label" for="complete">
                            1日人間ドック
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="mb-4 row justify-content-center">
                <label for="place" class="col-2 col-form-label">受診場所</label>
                <div class="col-5">
                    <input type="text" class="form-control" id="place" name="place">
                </div>
            </div>
            <div class="d-grid gap-2 col-5 mx-auto">
                <button type="submit" class="btn btn-primary">登録する</button>
            </div>
        </form>
    </div>
@endsection
