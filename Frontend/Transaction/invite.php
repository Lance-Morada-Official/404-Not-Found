<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite A Seller</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>
</head>
<body style="font-family: 'Poppins', sans-serif; background-color: #161530;">
	<?php 
require('..\..\Backend\include\session-include.php');
require('..\..\Backend\include\dbconnect-include.php');
require('..\..\Backend\Invite\invitebackend.php');

$connect->close();
?>
    <div style="max-width: 720px; margin: 0 auto; padding: 24px;">
        <h1 style="color: #fff; font-size: 24px; font-weight: bold; margin-bottom: 24px;">Invite A Friend</h1>

        <div style="background-color: #ffffff; border-radius: 10px; padding: 24px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <div style="margin-bottom: 24px;">
			<form method="get">
                <input type="text" name="search"  placeholder="Search ID or Username" style="width: 96%; padding: 12px; border: 1px solid #d1d5db; border-radius: 10px;" value="<?php echo htmlspecialchars($search); ?>">
            </form>
			</div>
			<!-- Friends -->
			<h2 style="font-size: 18px; font-weight: bold; margin-bottom: 24px;">Friends:</h2>

            <div style="margin-bottom: 24px;">
			
                
			<?php if ($fetchallf->num_rows > 0): ?>
				<?php while ($row = $fetchallf->fetch_assoc()): ?>
                <div style="background-color: #f7f7f7; padding: 16px; border-radius: 10px; margin-bottom: 16px;">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 40px; height: 40px; background-color: #d1d5db; border-radius: 50%; margin-right: 16px;"></div>
                        <div>
                            <p style="font-weight: bold;">Username: <?php echo htmlspecialchars($row['username']); ?></p>
                            <p style="font-size: 14px; color: #6b7280;">User ID: <?php echo htmlspecialchars($row['user_id']); ?></p>
                        </div>
                    </div>
					<form method='POST'>
					<input type="hidden" name="searched_id" value="<?php echo $row['user_id']; ?>">
                    <button style="background-color: #5d57d9; color: #ffffff; padding: 12px 24px; border: none; border-radius: 210px; cursor: pointer;" name="invite" type="submit">Invite</button>
					</form>
				</div>
				<?php endwhile; ?>
			<?php else: ?>
				<div style="display: flex; align-items: center;">
                        <div style="width: 40px; height: 40px; background-color: #d1d5db; border-radius: 50%; margin-right: 16px;"></div>
                        <div>
                            <p style="font-weight: bold;">------No Result Found------</p>
                        </div>
                </div>
			<?php endif; ?>
				
            </div>
			
        </div>
    </div>

</body>
</html>