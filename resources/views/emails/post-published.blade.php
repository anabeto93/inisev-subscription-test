<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>
            Hello {{ $user->name }},
        </p>
        <p>
            A new post has been published on our website that we think you might enjoy. Here's a brief overview:
        </p>
        <blockquote>
            {{ \Illuminate\Support\Str::limit($post->content, 150) }}
        </blockquote>
        <p>
            To read the full post, click on the link below:
        </p>
        <a href="{{ url('/posts/' . $post->id) }}" class="btn">Read More</a>
        <p>
            Thank you for subscribing to our updates. We hope you find our content valuable.
        </p>
        <p>
            Best regards,<br>
            The [Your Website Name] Team
        </p>
    </div>
</body>
</html>
