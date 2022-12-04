<ul>

    <?php foreach($courses as $course):
     $instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();?>
    <li>
        <div class="course-box-2">
            <div class="course-image">
                <a href="<?php echo site_url('home/course/'.slugify($course['title']).'/'.$course['id']) ?>">
                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course['id']); ?>" alt="" class="img-fluid">
                </a>
            </div>
            <div class="course-details">
                <a href="<?php echo site_url('home/course/'.slugify($course['title']).'/'.$course['id']); ?>" class="course-title"><?php echo $course['title']; ?></a>
                <a href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']) ?>" class="course-instructor">
                    <span class="instructor-name"><?php echo "Đăng bởi: ". $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></span>
                </a>
                <div class="course-subtitle">
                    <?php echo $course['short_description']; ?>
                </div>
                <div class="course-meta">
                    <span class=""><i class="fas fa-play-circle"></i>
                        28 videos
                    </span>
                    <span class=""><i class="far fa-clock"></i>
                        30 tiếng
                    </span>
                    <span class=""><i class="fa fa-level-up"></i><?php echo ucfirst($course['level']); ?></span>
                </div>
            </div>
            <div class="course-price-rating">
                <div class="course-price">
                    <?php if ($course['is_free_course'] == 1): ?>
                        <span class="current-price">Miễn phí</span>
                    <?php else: ?>
                        <?php if($course['discount_flag'] == 1): ?>
                            <span class="current-price"><?php echo currency($course['discounted_price']); ?></span>
                            <span class="original-price"><?php echo currency($course['price']); ?></span>
                        <?php else: ?>
                            <span class="current-price"><?php echo currency($course['price']); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="rating">
                    <?php                   
                        for($i = 1; $i < 6; $i++):?>                      
                        <i class="fas fa-star filled"></i>                       
                        <?php endfor; ?>
                    <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                </div>
                <div class="rating-number">
                    2k đánh giá
                </div>
            </div>
        </div>
    </li>
<?php endforeach; ?>
</ul>
