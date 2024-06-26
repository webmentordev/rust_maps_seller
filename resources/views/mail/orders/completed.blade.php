<x-mail::message>
# Your Order Has Been Completed  
Dear Valued Customer,

We are thrilled to inform you that your recent order with CustomRustPrints has been successfully completed! Your satisfaction is our top priority, and we are delighted to have been able to fulfill your order. You can click the button to download your map!

<x-mail::button :url="config('app.url').'/download/'.$checkout_id">
Download
</x-mail::button>

We would like to express our gratitude for choosing CustomRustPrints for your purchase. Your support means the world to us, and we hope that the products you've ordered will exceed your expectations.  

If you have any questions about your order or need further assistance, please don't hesitate to reach out to our dedicated customer support team at contact@customrustprints.online or our discord. We're here to help!

Thanks,<br>
CustomRustPrints Online
</x-mail::message>