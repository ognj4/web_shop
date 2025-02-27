@extends('layout')
@section('naslovStranice')
    Contact strana
@endsection
@section('sadrzajStranice')
    <form>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control">
        </div>
        <div class="mb-3 ">
            <label class="form-label">Message</label>
            <input type="text" name="message" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>

    <iframe class="mt-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d183628.44727442492!2d20.74202663222817!3d44.01737530778893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475720dbdee00fd9%3A0xdfa77784524b968!2sKragujevac!5e0!3m2!1sen!2srs!4v1738682181402!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
