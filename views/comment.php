<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Comments</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .be-comment-block {
            background-color: #ffffff;
            border: 1px solid #edeff2;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .comments-title {
            font-size: 24px;
            color: #262626;
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
        }

        .be-comment {
            display: flex;
            margin-bottom: 25px;
            border-bottom: 1px solid #e1e1e1;
            padding-bottom: 20px;
        }

        .be-img-comment {
            flex-shrink: 0;
            margin-right: 20px;
        }

        .be-ava-comment {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .be-comment-content {
            flex-grow: 1;
        }

        .be-comment-name {
            font-size: 16px;
            font-weight: bold;
            color: #383b43;
        }

        .be-comment-time {
            font-size: 12px;
            color: #b4b7c1;
            margin-top: 5px;
        }

        .be-comment-text {
            font-size: 14px;
            line-height: 1.6;
            color: #7a8192;
            background-color: #f6f6f7;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .form-block {
            margin-top: 40px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 15px 40px 15px 40px; /* Add padding for icons */
            font-size: 14px;
            color: #333;
            border: 1px solid #edeff2;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Position the icons inside the input fields */
        .form-group .icon,
        .form-group .icon1 {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #b5b8c2;
            font-size: 18px;
        }

        .btn-submit {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            border: none;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        @media (min-width: 768px) {
            .form-group {
                display: flex;
                justify-content: space-between;
            }

            .form-group .form-input {
                width: 48%;
            }
        }
    </style>
</head>
<body>

<?php if (!empty($error_message)): ?>
    <div class="error-message">
        <p><?= htmlspecialchars($error_message); ?></p>
    </div>
<?php endif; ?>

<div class="container">
    <div class="be-comment-block">
        <h1 class="comments-title">Comments (<?= count($comments) ?>)</h1>

        <!-- Display existing comments -->
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="profile.php?id=<?= $comment['user_id'] ?>">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        <span class="be-comment-name">
                            <a href="profile.php?id=<?= $comment['user_id'] ?>"><?= htmlspecialchars($comment['username']); ?></a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            <?= htmlspecialchars($comment['created_at']); ?>
                        </span>
                        <p class="be-comment-text">
                            <?= nl2br(htmlspecialchars($comment['note'])); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No comments yet. Be the first to comment!</p>
        <?php endif; ?>

        <!-- Comment Form -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <form method="POST" action="?act=comments&id=<?= $s_details['product_id'] ?>"> <!-- Truyền product_id qua URL -->
                <div class="form-group">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <input class="form-input" type="text" name="comment_name" placeholder="Your name" disabled value="<?= $_SESSION['user'] ?>" >
                </div>
                <div class="form-group">
                    <div class="icon1"><i class="fa fa-envelope-o"></i></div>
                    <input class="form-input" type="email" name="comment_email" placeholder="Your email" disabled value="<?= $_SESSION['email'] ?>" >
                </div>
                <div class="form-group">
                    <textarea class="form-input" name="comment_text" required placeholder="Your text"></textarea>
                </div>
                <button type="submit" class="btn-submit">Submit</button>
            </form>
        <?php else: ?>
            <p>You must be logged in to comment.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
