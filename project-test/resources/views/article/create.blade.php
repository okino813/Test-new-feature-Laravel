<form action="{{route("article.store")}}" method="POST">
    @csrf

    <label for="title">Titre</label>
    <input name="title" id="title">

    <label for="content">Contenue</label>
    <input name="content" id="content">

    <input type="submit">
</form>

<style>
    body{
        background: black;
        color: white;
    }
</style>
