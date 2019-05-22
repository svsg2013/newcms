@if(isset($errors) && count($errors) > 0)
    <script type="text/javascript">
        $(function(){
            $.confirm({
                icon: 'fa fa-warning',
                title: 'Thông Báo',
                content: '<ul> ' +
                '            @foreach($errors->all() as $err) ' +
                '                <li>{{$err}}</li> ' +
                '            @endforeach ' +
                '        </ul>',
                type: 'red',
                theme: 'light',
                typeAnimated: true,
                buttons: {
                    close: {
                        text: '{{trans('button.close')}}'
                    }
                }
            });
        });
    </script>
@endif

@if(session('message'))
    <script type="text/javascript">
        $(function(){
            $.confirm({
                icon: 'fa fa-warning',
                title: 'Thông Báo',
                content: '{!! session('message') !!}',
                type: 'blue',
                theme: 'light',
                typeAnimated: true,
                buttons: {
                    close: {
                        text: '{{trans('button.close')}}'
                    }
                }
            });
        });
    </script>
@endif


@if(session('error'))
    <script type="text/javascript">
        $(function(){
            $.confirm({
                icon: 'fa fa-warning',
                title: 'Thông Báo',
                content: '{!! session('error') !!}',
                type: 'red',
                theme: 'light',
                typeAnimated: true,
                buttons: {
                    close: {
                        text: '{{trans('button.close')}}'
                    }
                }
            });
        });
    </script>
@endif

@if(session('success'))
    <script type="text/javascript">
        $(function(){
            $.confirm({
                icon: 'fa fa-warning',
                title: 'Thông Báo',
                content: '{!! session('success') !!}',
                type: 'green',
                theme: 'light',
                typeAnimated: true,
                buttons: {
                    close: {
                        text: '{{trans('button.close')}}'
                    }
                }
            });
        });
    </script>
@endif