@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <button type="button" aria-hidden="true" class="close">×</button>
                <li style="list-style: none;"><b>{{ $error }}</b></li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('successMsg'))
    <div class="alert alert-success">
        <ul>
            <button type="button" aria-hidden="true" class="close">×</button>
		<span><b>{{ session('successMsg') }}</b></span>
        </ul>
    </div>
@endif

@if (session('banMsg'))
    <div class="alert alert-success">
        <ul>
            <button type="button" aria-hidden="true" class="close">×</button>
        <span><b>{{ session('banMsg') }}</b></span>
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <ul>
            <button type="button" aria-hidden="true" class="close">×</button>
                <span><b>{{ session('error') }}</b></span>
        </ul>
    </div>
@endif

<script type="text/javascript">
    
    $(document).ready(function(){
        $(".close").click(function(){
            $(".alert").hide();
        });
    });
    
</script>