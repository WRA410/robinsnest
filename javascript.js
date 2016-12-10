// Example 26-14: javascript.js

canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 97px Helvetica'
context.textBaseline = 'top'

image                = new Image()
image.src            = '42001-dog-and-cat-silhouettes-together.png'

image.onload = function()
{
  gradient = context.createLinearGradient(0, 0, 0, 89)
  gradient.addColorStop(0.00, '#a3c3ff')
  gradient.addColorStop(0.66, '#81a7ef')
  context.fillStyle = gradient
  context.fillText(  "Petstagram", 0, 0)
  context.strokeText("Petstagram", 0, 0)
}

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
