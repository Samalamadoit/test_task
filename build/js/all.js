$(document).ready(function(){$("#form").submit(function(t){t.preventDefault(),$.ajax({type:$(this).attr("method"),url:$(this).attr("action"),data:new FormData(this),contentType:!1,cache:!1,processData:!1,success:function(t){$("#result_id").html(t)}})}),$(function(){$("#datepicker").datepicker()}),$("#deposit-amount-range").on("input",function(){$("#deposit-amount-field").val(this.value)}),$("#deposit-replenishment-range").on("input",function(){$("#deposit-replenishment-amount").val(this.value)}),$(".calculator-form__label").change(function(t){$("#deposit-replenishment-amount").prop("disabled",!+$(t.target).val()),$("#deposit-replenishment-range").prop("disabled",!+$(t.target).val()),$("#deposit-replenishment-amount").val("")})});