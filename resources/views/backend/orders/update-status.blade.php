<span class="rounded text-light p-1
    @if ($order->status == 'pending') bg-warning
@elseif ($order->status == 'success') bg-success
@elseif ($order->status == 'shipped') bg-info
@elseif ($order->status == 'return') bg-danger @endif">{{ Str::ucfirst($order->status) }}</span>
