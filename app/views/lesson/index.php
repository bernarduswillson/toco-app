<?php
?>

<div class="lesson">
  <div class="container lesson-container">
    <h1 class="font-bold text-xl text-blue-purple-gradient">
      <?= $data["language"]["language_name"] ?>
    </h1>

    <form action="" method="GET">
      <div class="search-bar">
        <input type="text" placeholder="Search modules or videos" class="text-sm text-black font-reg">
        <button type="submit">
          <img id="search-icon" src="/public/icons/search-icon.svg" alt="Search icon">
        </button>
      </div>

      <div class="filter-sort">
        <select name="difficulty" id="difficulty-input" class="text-sm font-reg text-black">
          <option value="Beginner" selected>Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
        </select>

        <label class="sort-container text-sm font-reg">Sort A-Z
          <input type="checkbox" id="sort-input" name="sort" value="true">
          <span class="checkmark"></span>
        </label>
      </div>
    </form>

    <div class="card-container">
      <?php foreach ($data["modules"] as $module): ?>
        <div class="module-card">
          <div class="module-head">
            <div class="content">
              <h2 class="font-bold text-md">
                <?= $module["module_name"] ?> 
              </h2>
              <span class="font-reg text-xs">
                <?= $module["difficulty"] ?> &#9679; <?= $module["category"] ?> &#9679; <?= count($module["videos"]) ?> videos
              </span>
            </div>
  
            <?php if ($module["is_finished"]): ?>
              <svg class="check-icon" width="41" height="42" viewBox="0 0 41 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 41.5C31.8221 41.5 41 32.3221 41 21C41 9.67785 31.8221 0.5 20.5 0.5C9.17785 0.5 0 9.67785 0 21C0 32.3221 9.17785 41.5 20.5 41.5ZM27.7488 13.7512C28.1337 13.3668 28.6556 13.1511 29.1996 13.1515C29.7436 13.1518 30.2652 13.3683 30.6495 13.7533C31.0339 14.1382 31.2497 14.6601 31.2493 15.2041C31.2489 15.748 31.0324 16.2696 30.6475 16.654L19.0588 28.2426L19.0506 28.2508C18.8607 28.4419 18.6349 28.5935 18.3861 28.6969C18.1374 28.8004 17.8707 28.8536 17.6013 28.8536C17.3319 28.8536 17.0652 28.8004 16.8165 28.6969C16.5677 28.5935 16.3419 28.4419 16.1519 28.2508L16.1437 28.2426L10.3525 22.4514C10.1567 22.2623 10.0005 22.0361 9.89309 21.786C9.78565 21.5359 9.7291 21.2669 9.72674 20.9947C9.72437 20.7225 9.77624 20.4525 9.87931 20.2006C9.98239 19.9487 10.1346 19.7198 10.3271 19.5273C10.5196 19.3348 10.7485 19.1826 11.0004 19.0795C11.2523 18.9764 11.5223 18.9246 11.7945 18.9269C12.0667 18.9293 12.3357 18.9859 12.5858 19.0933C12.8359 19.2007 13.0621 19.3569 13.2512 19.5527L17.6013 23.9007L27.7488 13.7533V13.7512Z" fill="#F37021"/>
              </svg>
              <svg class="white-check-icon" width="41" height="42" viewBox="0 0 41 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 41.5C31.8221 41.5 41 32.3221 41 21C41 9.67785 31.8221 0.5 20.5 0.5C9.17785 0.5 0 9.67785 0 21C0 32.3221 9.17785 41.5 20.5 41.5ZM27.7488 13.7512C28.1337 13.3668 28.6556 13.1511 29.1996 13.1515C29.7436 13.1518 30.2652 13.3683 30.6495 13.7533C31.0339 14.1382 31.2497 14.6601 31.2493 15.2041C31.2489 15.748 31.0324 16.2696 30.6475 16.654L19.0588 28.2426L19.0506 28.2508C18.8607 28.4419 18.6349 28.5935 18.3861 28.6969C18.1374 28.8004 17.8707 28.8536 17.6013 28.8536C17.3319 28.8536 17.0652 28.8004 16.8165 28.6969C16.5677 28.5935 16.3419 28.4419 16.1519 28.2508L16.1437 28.2426L10.3525 22.4514C10.1567 22.2623 10.0005 22.0361 9.89309 21.786C9.78565 21.5359 9.7291 21.2669 9.72674 20.9947C9.72437 20.7225 9.77624 20.4525 9.87931 20.2006C9.98239 19.9487 10.1346 19.7198 10.3271 19.5273C10.5196 19.3348 10.7485 19.1826 11.0004 19.0795C11.2523 18.9764 11.5223 18.9246 11.7945 18.9269C12.0667 18.9293 12.3357 18.9859 12.5858 19.0933C12.8359 19.2007 13.0621 19.3569 13.2512 19.5527L17.6013 23.9007L27.7488 13.7533V13.7512Z" fill="#FFFFFF"/>
              </svg>
            <?php endif; ?>
          </div>

          <div class="video-card-container">
            <?php if ($module["videos"] == null): ?>
              <div class="video-card">
                <div class="content">
                  <h3 class="font-bold text-md">
                    No videos yet
                  </h3>
                  <span>
                    Coming soon
                  </span>
                </div>
              </div>
            <?php else: ?>
              <?php foreach ($module["videos"] as $video): ?>
                <div class="video-card">
                  <div class="content">
                    <h3 class="font-bold text-md">
                      <?= $video["video_name"] ?>
                    </h3>
                    <!-- masih hardcode -->
                    <?php if ($video["is_finished"]): ?>
                      <span style="color: var(--orange)" class="text-grey">
                        Completed
                      </span>
                    <?php else: ?>
                      <span style="color: var(--grey)" class="text-grey">
                        Not completed
                      </span>
                    <?php endif; ?>
                    <!-- -->
                  </div>
                
                  <a class="watch-btn text-xs font-reg" href="/learn/lesson/<?= $data["language"]["language_id"] ?>/<?= $module["module_id"] ?>/<?= $video["video_id"] ?>">
                    Watch >
                  </a>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            </div>
          </div>
      <?php endforeach; ?>
    </div>

    <div class="pagination-container">
      <a class="text-sm" href="">&lt;</a>
      <a class="text-sm active" href="">1</a>
      <a class="text-sm" href="">2</a>
      <a class="text-sm" href="">...</a>
      <a class="text-sm" href="">5</a>
      <a class="text-sm" href="">&gt;</a>
    </div>
  </div>
</div>

<script src="/public/js/sort-btn.js"></script>
<script src="/public/js/module-card.js"></script>