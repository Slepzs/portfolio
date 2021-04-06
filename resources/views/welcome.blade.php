<div>

  @foreach($feed as $f)
      {{ $f->getFirstMediaUrl('images') }}
  @endforeach

</div>
<style>
    .test {
        width: 100%;
        height: 100vh;

    }
</style>
