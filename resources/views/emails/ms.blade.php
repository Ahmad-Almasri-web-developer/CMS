<!DOCTYPE html>
<html>


<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4;">

  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">

    <h2 style="color: #333;">Dear {{ $name }}</h2>

    <hr style="border: 1px solid #ddd;">


    <p><strong>{{ $title }}</strong></p>
    <p> {{ $description }}</p>

    <p style="margin-top: 20px;">Best Regards,</p>
    <p>Ahmad Almasri</p>

    <!-- <p style="margin-top: 40px; font-size: 14px; color: #888;">This is an automated email. Please do not reply.</p> -->
  </div>

</body>
</html>
