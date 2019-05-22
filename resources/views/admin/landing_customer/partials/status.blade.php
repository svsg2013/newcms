<a class="btn-update-status btn {{ $data->status == 1 ? 'btn-primary' : 'btn-default' }}" href="{{ route('admin.landing_customer.update_status', $data->id) }}">
    {{ $data->status == 1 ? 'Inactive' : 'Active' }}
</a>