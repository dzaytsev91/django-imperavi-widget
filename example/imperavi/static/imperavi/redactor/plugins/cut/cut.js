if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.cut = {

	init: function()
	{
		this.buttonAdd('cut', 'Убрать под кат', this.insertAdvancedHtml);

		// Make button as Font Awesome icon
		this.buttonAwesome('cut', 'fa-arrow-down');
	},
	insertAdvancedHtml: function()
	{
		this.insertHtml('{cut} ');
	}
}