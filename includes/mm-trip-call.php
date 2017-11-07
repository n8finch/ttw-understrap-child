<?php

	function managedmissions_ttw_trip_display () { ?>
		<div class="trip-options clearfix" id="trip-options" style="display: <?php $mm_trip_options_display = get_post_meta( get_the_ID(), '_cmb_mm_trip_options_display', true); echo $mm_trip_options_display;?>;">
					<h4>Trip Options</h4>
				<div id="WHATthediv"></div>

				<script>

				var $j = jQuery.noConflict();

				var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
				function parsedate(adate) {
				  var start = adate.indexOf('(')
				  var end   = adate.indexOf(')')
				  adate = adate.substr(start+1, end-start-1);
				  adate++;
                  timezone = new Date();
                  adate += timezone.getTimezoneOffset() * 60 * 1000;
				  adate = new Date(adate);
                  return adate;
                }

				function builddatestr(depdate, retdate){
				  depdate = parsedate(depdate)
				  retdate = parsedate(retdate)
				  var difmonth = (depdate.getMonth() != retdate.getMonth())
				  var difyear = (depdate.getFullYear() != retdate.getFullYear())
				  var retstring = months[depdate.getMonth()]+" "+depdate.getDate()
				  if(difyear) retstring += ", "+depdate.getFullYear()
				  retstring += " - "
				  if(difmonth || difyear) retstring += months[retdate.getMonth()]
				  retstring += " "+retdate.getDate()+", "+retdate.getFullYear()
				  return retstring
				}

				$j.ajax({
				  dataType: 'jsonp',
				  url: "https://ttw.managedmissions.com/API/MissionTripAPI/List",
				  data: "apiKey=e4c2b86c-191a-4ab9-90d6-ffcab93b8c9c&GroupId="+<?php echo get_post_meta(get_the_id(), "_mm_options", true); ?>
				}).done(function(result) {
					$j("#WHATthediv").text("");
					if($j.isEmptyObject(result.data)){
					  $j("#WHATthediv").append(<?php echo json_encode(apply_filters('the_content', get_post_meta( get_the_ID(), '_cmb_mm_no_trip_content', true))); ?>)
					} else {
					    $j.each(result.data, function(i, v){
					    var tripMemGoal = v.TripMemberGoal
					    var quals = v.Qualifications
					    var status = v.PurposeCode
					    var missApps = v.MissionApplications

					    if(quals == null) quals = "N/A"
					    if(status == null) status = "Open"

						var datestr = builddatestr(v.DepartureDate, v.ReturnDate);

				        $j("#WHATthediv").append("<div class='col-sm-6 col-md-4 trip-tiles'><div class='panel panel-trip "+status+"'><div class='panel-heading'>"+ datestr +"</div><div class='panel-body'><div class='container'><div style='display:none;' class='row clearfix'><strong>Cost:</strong> $"+ tripMemGoal +"</div><div class='row clearfix'><strong>Status:</strong><br />"+ status +"</div><div class='row clearfix'><strong>Qualifications:</strong><br />"+ quals +"</div><div class='row clearfix'><strong>Apply:</strong></div><div class='row clearfix' id='WHATappLinks"+i+"'></div></div></div></div>");

					    $j.each(missApps, function(i2,v){
					      if(i2>0) $j("#WHATappLinks"+i);
					      $j("#WHATappLinks"+i).append("<a class='btn btn-accent btn-block clearfix' target='_blank' href='"+v.Url+"'>"+v.Name+"</a>")
					    })
				      })
					}
				}).fail(function() {
				  $j("#WHATthediv").append(<?php echo json_encode(apply_filters('the_content', get_post_meta( get_the_ID(), '_cmb_mm_no_trip_content', true))); ?>);
				});

				</script>

				</div><!-- /trip-options table -->
	<?php }

	?>