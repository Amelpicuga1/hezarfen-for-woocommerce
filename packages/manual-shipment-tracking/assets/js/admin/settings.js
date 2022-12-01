jQuery(function ($) {
	$(document).ready(function () {
		const notif_settings_rows = $('.notification').closest('tr:not(:first-child)');
		const notif_providers_row = $('.notif-provider').closest('tr');

		notif_settings_rows.addClass('notification'); // add classes to the "tr" elements to style them with CSS.

		$('.enable-sms-notif').on('change', function () {
			notif_settings_rows.toggle($(this).is(':checked')); // toggle visibility of the SMS notification settings.
			notif_providers_row.trigger('change');
		}
		).trigger('change');

		notif_providers_row.on('change', function () {
			const $this = $(this);
			if ($this.is(':visible')) {
				const is_netgsm_selected = $this.find('.notif-provider:checked').val() === 'netgsm';
				$('.netgsm').closest('tr').toggle(is_netgsm_selected); // toggle visibility of the NetGSM settings.
			}
		}
		).trigger('change');

		const sms_textarea = $('.netgsm.sms-content');

		if (sms_textarea.is(':enabled')) {
			$('.sms-variable').on('click', insertVariable);
		}

		function insertVariable() {
			const start = sms_textarea.prop('selectionStart');
			const end = sms_textarea.prop('selectionEnd');
			const textarea_text = sms_textarea.val();
			const inserted = textarea_text.substring(0, start) + this.innerText + textarea_text.substring(end);

			sms_textarea.val(inserted).prop('selectionEnd', end + this.innerText.length).focus();
		}
	});
});
