<script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}" />
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @session('success')
        toastr.success('{{ $value}}',"Thông báo");
    @endsession
    @session('error')
        toastr.error('{{ $value}}',"Báo lỗi")
        
    @endsession
</script>