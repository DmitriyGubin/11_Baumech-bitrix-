<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестовый");
?>

<link href="css/styles.css" rel="stylesheet">
	<link href="css/media.css" rel="stylesheet">
	<script src="js/jquery-3.6.0.js" type="text/javascript"></script>

<section class="play-video wrap">
	<div class="left-area">
		<div class="video-box">
			<video preload="metadata" id="video-player">
				<source src="video/sample.mp4" type="video/mp4">
				</video>

				<div class="video-buts">
					<div class="play-stop">
						<svg class="stop-video hide" width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g opacity="0.8">
								<path d="M0 2.5C0 1.11929 1.11929 0 2.5 0C3.88071 0 5 1.11929 5 2.5V14.5C5 15.8807 3.88071 17 2.5 17C1.11929 17 0 15.8807 0 14.5V2.5Z" fill="#E7E7E7"/>
								<path d="M10 2.5C10 1.11929 11.1193 0 12.5 0C13.8807 0 15 1.11929 15 2.5V14.5C15 15.8807 13.8807 17 12.5 17C11.1193 17 10 15.8807 10 14.5V2.5Z" fill="#E7E7E7"/>
							</g>
						</svg>

						<svg class="play-video-icon" width="20" height="17" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g id="Layer_50" data-name="Layer 50"><path d="m22.01074 96.80713a1.99865 1.99865 0 0 0 2.12207-.25879l55.05176-45a1.99942 1.99942 0 0 0 0-3.09668l-55.05176-45a2 2 0 0 0 -3.26562 1.54834v90a2.00037 2.00037 0 0 0 1.14355 1.80713zm2.85645-87.58936 49.8916 40.78223-49.8916 40.78223z" fill="#E7E7E7" style="fill: rgb(255, 255, 255);"></path></g></svg>
					</div>

					<div class="time-box">
						<div class="video-time current-video-time">00:00</div>
						<div class="polzunok-container-time">
							<div class="polzunok-time"></div>
						</div>
						<div class="video-time all-video-time"></div>
					</div>

					<div class="volume-box">
						<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.5" d="M10 15C10 15.5523 10.45 16.0066 10.998 15.9384C14.9453 15.4471 18 12.0803 18 8C18 3.9197 14.9453 0.552862 10.998 0.0616463C10.45 -0.00655635 10 0.447715 10 1V2C10 2.55228 10.4522 2.98957 10.9936 3.09873C13.279 3.55953 15 5.57879 15 8C15 10.4212 13.279 12.4405 10.9936 12.9013C10.4522 13.0104 10 13.4477 10 14V15Z" fill="#E7E7E7"/>
							<path opacity="0.5" d="M10 5C10.394 5 10.7841 5.0776 11.1481 5.22836C11.512 5.37913 11.8427 5.6001 12.1213 5.87868C12.3999 6.15726 12.6209 6.48797 12.7716 6.85195C12.9224 7.21593 13 7.60603 13 8C13 8.39397 12.9224 8.78407 12.7716 9.14805C12.6209 9.51203 12.3999 9.84274 12.1213 10.1213C11.8427 10.3999 11.512 10.6209 11.1481 10.7716C10.7841 10.9224 10.394 11 10 11L10 8L10 5Z" fill="#E7E7E7"/>
							<path d="M8 16V0L3 4H0V12H3L8 16Z" fill="#E7E7E7"/>
						</svg>
						<div class="polzunok-container-volume">
							<div class="polzunok-volume"></div> 
						</div>
					</div>

					<!-- download="" -->
					<a class="save-videio" href="video/sample.mp4" download="sample.mp4">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect y="15" width="18" height="3" rx="1.5" fill="#E7E7E7"/>
							<path d="M9 12.5C8.17157 12.5 7.5 11.8284 7.5 11L7.5 1.5C7.5 0.671573 8.17157 3.62117e-08 9 0C9.82843 -3.62117e-08 10.5 0.671573 10.5 1.5V11C10.5 11.8284 9.82843 12.5 9 12.5Z" fill="#E7E7E7"/>
							<path d="M7.93622 12.266C7.51903 11.5625 7.76661 10.6629 8.48921 10.2567L13.7257 6.46331C14.4483 6.05713 15.3723 6.29818 15.7895 7.00171C16.2067 7.70524 15.9591 8.60483 15.2365 9.01101L10 12.8044C9.2774 13.2106 8.35341 12.9695 7.93622 12.266Z" fill="#E7E7E7"/>
							<path d="M10.462 12.2657C10.8792 11.5622 10.6316 10.6626 9.90903 10.2564L4.26644 6.46303C3.54384 6.05684 2.61985 6.29789 2.20266 7.00142C1.78547 7.70496 2.03305 8.60455 2.75565 9.01073L8.39824 12.8041C9.12084 13.2103 10.0448 12.9692 10.462 12.2657Z" fill="#E7E7E7"/>
						</svg>
					</a>

					<svg class="full-screen" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 12.5C3 11.6716 2.32843 11 1.5 11C0.671573 11 0 11.6716 0 12.5V16C0 17.1046 0.89543 18 2 18H5.5C6.32843 18 7 17.3284 7 16.5C7 15.6716 6.32843 15 5.5 15H3V12.5Z" fill="#E7E7E7"/>
						<path d="M15 5.5C15 6.32843 15.6716 7 16.5 7C17.3284 7 18 6.32843 18 5.5V2C18 0.895431 17.1046 1.34314e-07 16 3.06121e-07L12.5 8.50519e-07C11.6716 9.79375e-07 11 0.671574 11 1.5C11 2.32843 11.6716 3 12.5 3L15 3V5.5Z" fill="#E7E7E7"/>
						<path d="M5.5 3C6.32843 3 7 2.32843 7 1.5C7 0.671573 6.32843 1.892e-07 5.5 1.52988e-07L2 0C0.895431 -4.82823e-08 2.18557e-08 0.89543 4.88162e-08 2L1.34245e-07 5.5C1.54465e-07 6.32843 0.671573 7 1.5 7C2.32843 7 3 6.32843 3 5.5L3 3L5.5 3Z" fill="#E7E7E7"/>
						<path d="M12.5 15C11.6716 15 11 15.6716 11 16.5C11 17.3284 11.6716 18 12.5 18H16C17.1046 18 18 17.1046 18 16V12.5C18 11.6716 17.3284 11 16.5 11C15.6716 11 15 11.6716 15 12.5V15H12.5Z" fill="#E7E7E7"/>
					</svg>
				</div>
			</div>

			<div class="title-box">
				<div>
					<h1 class="sub-title">DXDZ-250B Обзор упаковочной машины!</h1>
					<div class="sub-title-descr">
						<span class="sub-title-descr">204 просмотра</span>
						<svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="2" cy="2" r="2" fill="#7F8692"/>
						</svg>
						<span class="sub-title-descr">2 недели назад</span>
					</div>
				</div>

				<div class="button-box">
					<button class="video-button" id="any-quest">
						<svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.63511 12.7298L5.35065 13.0876L5.51337 12.7621L5.37503 12.4256L4.63511 12.7298ZM2 18L1.28446 17.6422L0.506585 19.198L2.19403 18.7761L2 18ZM7.76356 16.5591L8.2099 15.8952L7.91466 15.6967L7.56953 15.783L7.76356 16.5591ZM20.2 9.5C20.2 13.7526 16.7526 17.2 12.5 17.2V18.8C17.6362 18.8 21.8 14.6362 21.8 9.5H20.2ZM12.5 1.8C16.7526 1.8 20.2 5.24741 20.2 9.5H21.8C21.8 4.36375 17.6362 0.2 12.5 0.2V1.8ZM4.8 9.5C4.8 5.24741 8.24741 1.8 12.5 1.8V0.2C7.36375 0.2 3.2 4.36375 3.2 9.5H4.8ZM5.37503 12.4256C5.00465 11.5247 4.8 10.5372 4.8 9.5H3.2C3.2 10.7495 3.44685 11.9434 3.89519 13.034L5.37503 12.4256ZM3.91957 12.372L1.28446 17.6422L2.71554 18.3578L5.35065 13.0876L3.91957 12.372ZM2.19403 18.7761L7.95759 17.3352L7.56953 15.783L1.80597 17.2239L2.19403 18.7761ZM12.5 17.2C10.9104 17.2 9.43555 16.7192 8.2099 15.8952L7.31722 17.223C8.79849 18.2189 10.5826 18.8 12.5 18.8V17.2Z" fill="#004EA4"/>
						</svg>
						Есть вопрос?
					</button>

					<button class="video-button" id="add-favorites">
						<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 18.3963L15 2C15 1.44772 14.5523 1 14 1L2 0.999999C1.44772 0.999999 1 1.44772 1 2L1 18.4176C1 18.6615 1.27559 18.8035 1.47418 18.6619L8.21212 13.8571L14.5188 18.6354C14.7164 18.7851 15 18.6442 15 18.3963Z" stroke="#004EA4" stroke-width="1.5" stroke-linecap="round"/>
						</svg>
						<span>В избранное</span>
					</button>
				</div>
			</div>

			<p class="about-video-text short">
				Когда речь заходит о станках о бизнесе, нельзя обойти мини производство стороной. Оборудование для бизнеса позволяет открыть мини производство и зарабатывать и подвяливания различных мясных деликатесов приготовле...
			</p>

			<p class="about-video-text full hide">
				Когда речь заходит о станках о бизнесе, нельзя обойти мини производство стороной. Оборудование для бизнеса позволяет открыть мини производство и зарабатывать и подвяливания различных мясных деликатесов приготовле Когда речь заходит о станках о бизнесе, нельзя обойти мини производство стороной. Оборудование для бизнеса позволяет открыть мини производство и зарабатывать и подвяливания различных мясных деликатесов приготовле
			</p>

			<div class="more-text">
				<span>Полное описание</span>
				<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 0.75L6.5 6.25L1 0.75" stroke="#004EA4" stroke-linecap="round"/>
				</svg>
			</div>

			<div class="delimeter"></div>

			<div class="comments-line">
				<p class="comments-num">2 комментария</p>
				<div class="comments-show-hide" style="display: none;">
					<span>Скрыть</span>
					<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 0.75L6.5 6.25L1 0.75" stroke="#004EA4" stroke-linecap="round"/>
					</svg>
				</div>
			</div>
			<div class="hide-show-mobile-commentary-box">
				<div class="login-register-box">
					Вы тоже можете оставлять комментраии – <a href="#">Войдите</a> или <a href="#">Зарегестрируйтесь</a>
				</div>

				<div class="commentary-box-input">
					<div class="ava-box">
						<img src="img/ava.png">
					</div>

					<div class="comment-video-box">
						<input id="comment-video-input" type="text" placeholder="Ваш комментарий">

						<div class="line-arrow" style="display: none;">
							<svg class="vert-line" width="2" height="26" viewBox="0 0 2 26" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 0V26" stroke="#EDF2F9"/>
							</svg>
							<svg class="comment-arrow" width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.5 8.5H19.5M19.5 8.5L12 1M19.5 8.5L12 16" stroke="#4294FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>

						<button class="buttons" id="send-comment" style="display: none;">
							Отправить
						</button>
					</div>
				</div>

				<div class="commentary-box">
					<div class="commentary-item">
						<div class="ava-box">
							<img src="img/ava.png">
						</div>

						<div class="commentary-text-box">
							<div class="author-date">
								<span class="commentary-athor">Елизавета</span>
								<svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="2" cy="2" r="2" fill="#7F8692"/>
								</svg>
								<span class="commentary-date">Елизавета</span>
							</div>

							<div class="commentary-text">
								Вакуумный массажер GRZK200 – это современное мясоперерабатывающее оборудование, отвечающее европейским стандартам качества и безопасности. Предназначен для массирования мяса, птицы, рыбы, просаливания и подвяливания различных мясных деликатесов перед приготовлением.
							</div>
						</div>
					</div>

					<div class="commentary-item">
						<div class="ava-box">
							<img src="img/ava.png">
						</div>

						<div class="commentary-text-box">
							<div class="author-date">
								<span class="commentary-athor">Елизавета</span>
								<svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="2" cy="2" r="2" fill="#7F8692"/>
								</svg>
								<span class="commentary-date">Елизавета</span>
							</div>

							<div class="commentary-text">
								Вакуумный массажер GRZK200 – это современное мясоперерабатывающее оборудование, отвечающее европейским стандартам качества и безопасности. Предназначен для массирования мяса, птицы, рыбы, просаливания и подвяливания различных мясных деликатесов перед приготовлением.
							</div>
						</div>
					</div>
				</div>
			</div>

			<div style="display: none;" class="delimeter mobile"></div>
		</div>

		<div class="right-area">
			<h2 class="similar-title">Похожие видео</h2>
			<div class="similar-box">
				<a class="similar-item" href="#">
					<div class="poster-box">
						<img class="poster-img" src="img/ava.png">
					</div>

					<div class="about-similar">
						<div class="similar-text">
							DXDZ-250B Обзор машины с очень длинным названи...
						</div>

						<div class="video-option" style="display: none;">
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
						</div>
						<p class="similar-date">Вчера</p>
					</div>

					<div class="opts-box-video hide">
						<div class="option-item">
							<svg class="opt-box-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.3741 8.33333C22.7794 9.48019 23 10.7143 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C13.5656 1 15.0549 1.32709 16.4031 1.91667" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
								<path d="M12 17V11.4538C12 11.1654 12.1245 10.8911 12.3415 10.7012L20 4" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">Смотреть позже</p>
						</div>

						<div class="option-item">
							<svg class="opt-box-svg" width="19" height="23" viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18 21.4L18 2C18 1.44772 17.5523 1 17 1L2.5 0.999999C1.94772 0.999999 1.5 1.44771 1.5 2L1.5 21.421C1.5 21.6643 1.77428 21.8064 1.973 21.6661L10 16L17.52 21.64C17.7178 21.7883 18 21.6472 18 21.4Z" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">В избранное</p>
						</div>
					</div>
				</a>

				<a class="similar-item" href="#">
					<div class="poster-box">
						<img class="poster-img" src="img/ava.png">
					</div>

					<div class="about-similar">
						<div class="similar-text">
							DXDZ-250B Обзор машины с очень длинным названи...
						</div>

						<div class="video-option" style="display: none;">
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
						</div>
						<p class="similar-date">Вчера</p>
					</div>

					<div class="opts-box-video hide">
						<div class="option-item">
							<svg class="opt-box-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.3741 8.33333C22.7794 9.48019 23 10.7143 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C13.5656 1 15.0549 1.32709 16.4031 1.91667" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
								<path d="M12 17V11.4538C12 11.1654 12.1245 10.8911 12.3415 10.7012L20 4" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">Смотреть позже</p>
						</div>

						<div class="option-item">
							<svg class="opt-box-svg" width="19" height="23" viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18 21.4L18 2C18 1.44772 17.5523 1 17 1L2.5 0.999999C1.94772 0.999999 1.5 1.44771 1.5 2L1.5 21.421C1.5 21.6643 1.77428 21.8064 1.973 21.6661L10 16L17.52 21.64C17.7178 21.7883 18 21.6472 18 21.4Z" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">В избранное</p>
						</div>
					</div>
				</a>

				<a class="similar-item" href="#">
					<div class="poster-box">
						<img class="poster-img" src="img/ava.png">
					</div>

					<div class="about-similar">
						<div class="similar-text">
							DXDZ-250B Обзор машины с очень длинным названи...
						</div>

						<div class="video-option" style="display: none;">
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
						</div>
						<p class="similar-date">Вчера</p>
					</div>

					<div class="opts-box-video hide">
						<div class="option-item">
							<svg class="opt-box-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.3741 8.33333C22.7794 9.48019 23 10.7143 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C13.5656 1 15.0549 1.32709 16.4031 1.91667" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
								<path d="M12 17V11.4538C12 11.1654 12.1245 10.8911 12.3415 10.7012L20 4" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">Смотреть позже</p>
						</div>

						<div class="option-item">
							<svg class="opt-box-svg" width="19" height="23" viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18 21.4L18 2C18 1.44772 17.5523 1 17 1L2.5 0.999999C1.94772 0.999999 1.5 1.44771 1.5 2L1.5 21.421C1.5 21.6643 1.77428 21.8064 1.973 21.6661L10 16L17.52 21.64C17.7178 21.7883 18 21.6472 18 21.4Z" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">В избранное</p>
						</div>
					</div>
				</a>

				<a class="similar-item" href="#">
					<div class="poster-box">
						<img class="poster-img" src="img/ava.png">
					</div>

					<div class="about-similar">
						<div class="similar-text">
							DXDZ-250B Обзор машины с очень длинным названи...
						</div>

						<div class="video-option" style="display: none;">
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
							<div class="video-option-round"></div>
						</div>
						<p class="similar-date">Вчера</p>
					</div>

					<div class="opts-box-video hide">
						<div class="option-item">
							<svg class="opt-box-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.3741 8.33333C22.7794 9.48019 23 10.7143 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C13.5656 1 15.0549 1.32709 16.4031 1.91667" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
								<path d="M12 17V11.4538C12 11.1654 12.1245 10.8911 12.3415 10.7012L20 4" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">Смотреть позже</p>
						</div>

						<div class="option-item">
							<svg class="opt-box-svg" width="19" height="23" viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18 21.4L18 2C18 1.44772 17.5523 1 17 1L2.5 0.999999C1.94772 0.999999 1.5 1.44771 1.5 2L1.5 21.421C1.5 21.6643 1.77428 21.8064 1.973 21.6661L10 16L17.52 21.64C17.7178 21.7883 18 21.6472 18 21.4Z" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"/>
							</svg>

							<p class="option-title">В избранное</p>
						</div>
					</div>
				</a>
			</div>
			<div id="more-similar-box">
				<!-- <button id="more-similar">Показать еще</button> -->
			</div>
		</div>
	</section>

	<script src="js/jquery.ui.touch-punch.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js" type="text/javascript"></script>




	<!-- <iframe loading="lazy" frameborder="0" allowfullscreen="" data-original="https://www.youtube.com/embed/sZ1jcvrKhBw?" src="https://www.youtube.com/embed/sZ1jcvrKhBw?"></iframe> -->

	<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>