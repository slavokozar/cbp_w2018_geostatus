<form method="post"
  action="{{ action('StatusController@store') }}">
    {!! csrf_field() !!}

    <input type="text" name="status">

    <input type="text" name="lat">
    <input type="text" name="lng">

    <input type="submit"/>
</form>