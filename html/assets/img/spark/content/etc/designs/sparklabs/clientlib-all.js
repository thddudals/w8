$(document).ready(function(){
	$(window).load(function() {
        var mqMinVarArticleRef = window.matchMedia("(min-width: 640px)");
        var mqMaxVarArticleRef = window.matchMedia("(max-width: 1200px)");
        if ($(".hero-article-img").length) {
            if (mqMinVarArticleRef.matches) {
                if (mqMaxVarArticleRef.matches) {
                    var maxHeight = 0;
                    $(".hero-article-container > div > div > div").each(function() {
                        var getHeightArticalRef = $(this).height();
                        if (getHeightArticalRef > maxHeight) {
                            maxHeight = getHeightArticalRef;
                        }
                    });
                    $(".hero-article-img img").height(maxHeight);
                }
            }
        }
    });
});
var accordionContainerId = "";
var accordionContainer = $(".one-spark-accordion-container");
var accordionEntry = $(".one-spark-accordion-entry");

// Sets unique id to the accordion container
accordionContainer.each(function(index) {
  $(this).attr("id", "spark-lab-accordion" + index);
});

// Gets the accordion container(parent) id and pushes it to its child accordion
// entry.
accordionEntry.each(function(index) {
  accordionContainerId = $(this)
    .parents(".one-spark-accordion-container")
    .attr("id");
  $(this)
    .find(".accordian-link")
    .attr("data-parent", "#" + accordionContainerId);

  if (
    $(this)
      .find(".panel-collapse")
      .attr("id") === undefined
  ) {
    $(this)
      .find(".accordian-link")
      .attr("href", "#" + accordionContainerId + index);
    $(this)
      .find(".panel-collapse")
      .attr("id", accordionContainerId + index);
  }
});

