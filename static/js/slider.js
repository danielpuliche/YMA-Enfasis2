document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.input-left').forEach(function(input) {
      var percentLeft = 0;
      var percentRight = 0;
      var percentMiddle = 0;
      var inputLeft = input;
      var inputRight = input.nextSibling.nextSibling;
      var thumbLeft = inputRight.nextSibling.nextSibling.querySelector(".slider > .thumb.left");
      var thumbRight = inputRight.nextSibling.nextSibling.querySelector(".slider > .thumb.right");
      var trackLeft = inputRight.nextSibling.nextSibling.querySelector(".slider > .l-track");
      var trackRight = inputRight.nextSibling.nextSibling.querySelector(".slider > .r-track");
      var range = inputRight.nextSibling.nextSibling.querySelector(".slider > .range");
      var percentTextLeft = inputLeft.parentElement.parentElement.parentElement.parentElement.nextElementSibling.querySelector(".l-percent");
      var percentTextMiddle = inputLeft.parentElement.parentElement.parentElement.parentElement.nextElementSibling.querySelector(".m-percent");
      var percentTextRight = inputLeft.parentElement.parentElement.parentElement.parentElement.nextElementSibling.querySelector(".r-percent");
      setLeftValue(percentLeft, percentRight, percentMiddle, inputLeft, inputRight, thumbLeft, thumbRight, trackLeft, trackRight, range, percentTextLeft, percentTextRight, percentTextMiddle);
      setRightValue(percentLeft, percentRight, percentMiddle, inputLeft, inputRight, thumbLeft, thumbRight, trackLeft, trackRight, range, percentTextLeft, percentTextRight, percentTextMiddle);
      inputLeft.addEventListener("input", () => setLeftValue(percentLeft, percentRight, percentMiddle, inputLeft, inputRight, thumbLeft, thumbRight, trackLeft, trackRight, range, percentTextLeft, percentTextRight, percentTextMiddle));
      inputRight.addEventListener("input", () => setRightValue(percentLeft, percentRight, percentMiddle, inputLeft, inputRight, thumbLeft, thumbRight, trackLeft, trackRight, range, percentTextLeft, percentTextRight, percentTextMiddle));
      inputLeft.addEventListener("mouseover", function() {
        thumbLeft.classList.add("hover");
      });
      inputLeft.addEventListener("mouseout", function() {
        thumbLeft.classList.remove("hover");
      });
      inputLeft.addEventListener("mousedown", function() {
        thumbLeft.classList.add("active");
      });
      inputLeft.addEventListener("mouseup", function() {
        thumbLeft.classList.remove("active");
      });
      inputRight.addEventListener("mouseover", function() {
        thumbRight.classList.add("hover");
      });
      inputRight.addEventListener("mouseout", function() {
        thumbRight.classList.remove("hover");
      });
      inputRight.addEventListener("mousedown", function() {
        thumbRight.classList.add("active");
      });
      inputRight.addEventListener("mouseup", function() {
        thumbRight.classList.remove("active");
      });
    });

    function setLeftValue(percentLeft, percentRight, percentMiddle, inputLeft, inputRight, thumbLeft, thumbRight, trackLeft, trackRight, range, percentTextLeft, percentTextRight, percentTextMiddle) {
        min = parseInt(inputLeft.min),
        max = parseInt(inputLeft.max);

      inputLeft.value = Math.min(parseInt(inputLeft.value), parseInt(inputRight.value) - 1);

      var l_percent = ((inputLeft.value - min) / (max - min)) * 100;
      var r_percent = ((inputRight.value - min) / (max - min)) * 100;

      thumbLeft.style.left = l_percent + "%";
      trackLeft.style.left = l_percent + "%";
      range.style.left = l_percent + "%";
      percentLeft = l_percent;
      percentRight = 100 - r_percent;
      percentMiddle = 100 - percentRight - percentLeft;
      setPercentText(percentLeft, percentRight, percentMiddle, percentTextLeft, percentTextRight, percentTextMiddle);
    }

    function setRightValue(percentLeft, percentRight, percentMiddle, inputLeft, inputRight, thumbLeft, thumbRight, trackLeft, trackRight, range, percentTextLeft, percentTextRight, percentTextMiddle) {
        min = parseInt(inputRight.min),
        max = parseInt(inputRight.max);

      inputRight.value = Math.max(parseInt(inputRight.value), parseInt(inputLeft.value) + 1);

      var l_percent = ((inputLeft.value - min) / (max - min)) * 100;
      var r_percent = ((inputRight.value - min) / (max - min)) * 100;

      thumbRight.style.right = (100 - r_percent) + "%";
      trackRight.style.right = (100 - r_percent) + "%";
      range.style.right = (100 - r_percent) + "%";
      percentLeft = l_percent;
      percentRight = 100 - r_percent;
      percentMiddle = 100 - percentRight - percentLeft;
      setPercentText(percentLeft, percentRight, percentMiddle, percentTextLeft, percentTextRight, percentTextMiddle);
    }

    function setPercentText(percentLeft, percentRight, percentMiddle, percentTextLeft, percentTextRight, percentTextMiddle) {
      percentTextLeft.innerHTML = Math.round(percentLeft) + "%";
      percentTextLeft.nextElementSibling.value = Math.round(percentLeft);
      percentTextMiddle.innerHTML = Math.round(percentMiddle) + "%";
      percentTextMiddle.nextElementSibling.value = Math.round(percentMiddle);
      percentTextRight.innerHTML = Math.round(percentRight) + "%";
      percentTextRight.nextElementSibling.value = Math.round(percentRight);
    }

});
