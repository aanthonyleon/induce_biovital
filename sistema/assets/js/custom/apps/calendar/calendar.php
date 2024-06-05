"use strict";

var KTAppCalendar=function(){var e,t,n,a,o,r,i,l,d,s,c,m,u,v,f,p,y,D,_,b,k,g,S,Y,h,T,M,w,E,L,x={id:"",eventName:"",eventDescription:"",eventLocation:"",startDate:"",endDate:"",allDay:!1},B=!1;

const q=e=>{C();

	const n=x.allDay?moment(x.tartDate).format("Do MMM, YYYY"):moment(x.startDate).format("Do MMM, YYYY - h:mm a"),a=x.allDay?moment(x.endDate).format("Do MMM, YYYY"):moment(x.endDate).format("Do MMM, YYYY - h:mm a");

	var o={container:"body",trigger:"manual",boundary:"window",placement:"auto",dismiss:!0,html:!0,title:"Event Summary",content:'<div class="fw-bolder mb-2">'+x.eventName+'</div><div class="fs-7"><span class="fw-bold">Start:</span> '+n+'</div><div class="fs-7 mb-4"><span class="fw-bold">End:</span> '+a+'</div><div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">View More</div>'};

(t=KTApp.initBootstrapPopover(e,o)).show(),B=!0,F()},C=()=>{B&&(t.dispose(),B=!1)},N=()=>{f.innerText="Agendar";

const t=p.querySelectorAll('[data-kt-calendar="datepicker"]'),r=p.querySelector("#kt_calendar_datepicker_allday");

r.addEventListener("click",(e=>{e.target.checked?t.forEach((e=>{e.classList.add("d-none")})):(d.setDate(x.startDate,!0,"Y-m-d"),t.forEach((e=>{e.classList.remove("d-none")})))})),O(x),_.addEventListener("click",(function(t){t.preventDefault(),y&&y.validate().then((function(t){console.log("validated!"),"Valid"==t?(_.setAttribute("data-kt-indicator","on"),_.disabled=!0,setTimeout((function(){_.removeAttribute("data-kt-indicator"),Swal.fire({text:"New event added to calendar!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}).then((function(t){if(t.isConfirmed){v.hide(),_.disabled=!1;

	let t=!1;

	r.checked&&(t=!0),0===c.selectedDates.length&&(t=!0);

var l=moment(i.selectedDates[0]).format(),s=moment(d.selectedDates[d.selectedDates.length-1]).format();

if(!t){const e=moment(i.selectedDates[0]).format("YYYY-MM-DD"),t=e;

l=e+"T"+moment(c.selectedDates[0]).format("HH:mm:ss"),s=t+"T"+moment(u.selectedDates[0]).format("HH:mm:ss")}e.addEvent({id:V(),title:n.value,description:a.value,location:o.value,start:l,end:s,allDay:t}),e.render(),p.reset()}}))}),2e3)):Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))}))},A=()=>{var e,t,n;

	x.allDay?(e="All Day",t=moment(x.startDate).format("Do MMM, YYYY"),n=moment(x.endDate).format("Do MMM, YYYY")):(e="",t=moment(x.startDate).format("Do MMM, YYYY - h:mm a"),n=moment(x.endDate).format("Do MMM, YYYY - h:mm a")),g.innerText=x.eventName,S.innerText=e,Y.innerText=x.eventDescription?x.eventDescription:"--",h.innerText=x.eventLocation?x.eventLocation:"--",T.innerText=t,M.innerText=n},H=()=>{E.addEventListener("click",(t=>{t.preventDefault(),w.hide(),(()=>{f.innerText="Editar",v.show();

		const t=p.querySelectorAll('[data-kt-calendar="datepicker"]'),r=p.querySelector("#kt_calendar_datepicker_allday");

	r.addEventListener("click",(e=>{e.target.checked?t.forEach((e=>{e.classList.add("d-none")})):(d.setDate(x.startDate,!0,"Y-m-d"),t.forEach((e=>{e.classList.remove("d-none")})))})),O(x),_.addEventListener("click",(function(t){t.preventDefault(),y&&y.validate().then((function(t){console.log("validated!"),"Valid"==t?(_.setAttribute("data-kt-indicator","on"),_.disabled=!0,setTimeout((function(){_.removeAttribute("data-kt-indicator"),Swal.fire({text:"New event added to calendar!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}).then((function(t){if(t.isConfirmed){v.hide(),_.disabled=!1,e.getEventById(x.id).remove();

	let t=!1;

	r.checked&&(t=!0),0===c.selectedDates.length&&(t=!0);

var l=moment(i.selectedDates[0]).format(),s=moment(d.selectedDates[d.selectedDates.length-1]).format();

if(!t){const e=moment(i.selectedDates[0]).format("YYYY-MM-DD"),t=e;

l=e+"T"+moment(c.selectedDates[0]).format("HH:mm:ss"),s=t+"T"+moment(u.selectedDates[0]).format("HH:mm:ss")}e.addEvent({id:V(),title:n.value,description:a.value,location:o.value,start:l,end:s,allDay:t}),e.render(),p.reset()}}))}),2e3)):Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))}))})()}))},F=()=>{document.querySelector("#kt_calendar_event_view_button").addEventListener("click",(e=>{e.preventDefault(),C(),A()}))},O=()=>{n.value=x.eventName?x.eventName:"",a.value=x.eventDescription?x.eventDescription:"",o.value=x.eventLocation?x.eventLocation:"",i.setDate(x.startDate,!0,"Y-m-d");

	const e=x.endDate?x.endDate:moment(x.startDate).format();

d.setDate(e,!0,"Y-m-d");

const t=p.querySelector("#kt_calendar_datepicker_allday"),r=p.querySelectorAll('[data-kt-calendar="datepicker"]');

x.allDay?(t.checked=!0,r.forEach((e=>{e.classList.add("d-none")}))):(c.setDate(x.startDate,!0,"Y-m-d H:i"),u.setDate(x.endDate,!0,"Y-m-d H:i"),d.setDate(x.startDate,!0,"Y-m-d"),t.checked=!1,r.forEach((e=>{e.classList.remove("d-none")})))},P=e=>{x.id=e.id,x.eventName=e.title,x.eventDescription=e.description,x.eventLocation=e.location,x.startDate=e.startStr,x.endDate=e.endStr,x.allDay=e.allDay},V=()=>Date.now().toString()+Math.floor(1e3*Math.random()).toString();

return{init:function(){const t=document.getElementById("kt_modal_add_event");

p=t.querySelector("#kt_modal_add_event_form"),n=p.querySelector('[name="calendar_event_name"]'),a=p.querySelector('[name="calendar_event_description"]'),o=p.querySelector('[name="calendar_event_location"]'),r=p.querySelector("#kt_calendar_datepicker_start_date"),l=p.querySelector("#kt_calendar_datepicker_end_date"),s=p.querySelector("#kt_calendar_datepicker_start_time"),m=p.querySelector("#kt_calendar_datepicker_end_time"),D=document.querySelector('[data-kt-calendar="add"]'),_=p.querySelector("#kt_modal_add_event_submit"),b=p.querySelector("#kt_modal_add_event_cancel"),k=t.querySelector("#kt_modal_add_event_close"),f=p.querySelector('[data-kt-calendar="title"]'),v=new bootstrap.Modal(t);

const B=document.getElementById("kt_modal_view_event");

var F,O,I,R,G,K;

w=new bootstrap.Modal(B),
g=B.querySelector('[data-kt-calendar="event_name"]'),
S=B.querySelector('[data-kt-calendar="all_day"]'),
Y=B.querySelector('[data-kt-calendar="event_description"]'),
h=B.querySelector('[data-kt-calendar="event_location"]'),
T=B.querySelector('[data-kt-calendar="event_start_date"]'),
M=B.querySelector('[data-kt-calendar="event_start_date"]'),
E=B.querySelector("#kt_modal_view_event_edit"),
L=B.querySelector("#kt_modal_view_event_delete"),
F=document.getElementById("kt_calendar_app"),
O=moment().startOf("day"),
I=O.format("YYYY-MM"),
R=O.clone().subtract(1,
"day").format("YYYY-MM-DD"),
G=O.format("YYYY-MM-DD"),
K=O.clone().add(1,"day").format("YYYY-MM-DD"),
(e=new FullCalendar.Calendar(F,{headerToolbar:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,timeGridDay"},
	initialDate:G,
	navLinks:!0,
	selectable:!0,
	selectMirror:!0,

	locale: 'es',
	select:function(e){
		C(),P(e),N()
	},
	eventClick:function(e){
		console.log(e);
		get_calendario_info(e.event.id);
		$('#id_agenda_editar').val(e.event.id);
		C(),
		P(
			{
				id:e.event.id,
				title:e.event.title,
				description:e.event.extendedProps.description,
				location:e.event.extendedProps.location,
				startStr:e.event.startStr,
				endStr:e.event.endStr,
				allDay:e.event.allDay
			}
		),
		A()
	},
	eventMouseEnter:function(e){
		P(
			{
				id:e.event.id,
				title:e.event.title,
				description:e.event.extendedProps.description,
				location:e.event.extendedProps.location,
				startStr:e.event.startStr,
				endStr:e.event.endStr,
				allDay:e.event.allDay
			}
		),
		q(e.el)},editable:!0,dayMaxEvents:!0,
		events: [
	        <?php 
	        	include("../../../../../../configuration/backend/private/conexion.php");
	        	include("../../../../../../configuration/backend/helpers/session_check.php");

// if ($BIOVITAL_ACCESS=='true') {
	        		$rget_agenda = $mysqli->query("SELECT * FROM agenda");
	        	// }else{
	        	// 	$rget_agenda = $mysqli->query("SELECT * FROM agenda WHERE id_usuario=$BIOVITAL_ID");
	        	// }

		        if ($rget_agenda) {
		            while($array = $rget_agenda->fetch_object()) {
		                $agenda_id            = htmlspecialchars($array->id);
		                $agenda_id_cliente    = htmlspecialchars($array->id_cliente);
		                $agenda_id_servicio   = htmlspecialchars($array->id_servicio);
		                $agenda_titulo        = htmlspecialchars($array->titulo);
		                $agenda_fecha_inicio  = htmlspecialchars($array->fecha_inicio);
		                $agenda_hora_inicio   = htmlspecialchars($array->hora_inicio);
		                $agenda_fecha_fin     = htmlspecialchars($array->fecha_fin);
		                $agenda_hora_fin      = htmlspecialchars($array->hora_fin);
		                $agenda_descripcion   = htmlspecialchars($array->descripcion);
		                $agenda_estatus       = htmlspecialchars($array->estatus);
		                $agenda_date_register = htmlspecialchars($array->date_register);

		                $agenda_dia_inicio = date('d', strtotime($agenda_fecha_inicio));
		                $agenda_dia_fin    = date('d', strtotime($agenda_fecha_fin));

		                $agenda_nombre = 'No se encontró';
		                $rget_cliente = $mysqli->query("SELECT nombre FROM clientes WHERE id=$agenda_id_cliente");
		                if ($rget_cliente && $rget_cliente->num_rows > 0) {
		                    $cliente = $rget_cliente->fetch_object();
		                    $agenda_nombre = htmlspecialchars($cliente->nombre);
		                }

		                $agenda_servicio_nombre = 'No se encontró';
		                $agenda_servicio_descripcion = 'No se encontró';
		                $rget_servicio = $mysqli->query("SELECT nombre, descripcion FROM servicios WHERE id=$agenda_id_servicio");
		                if ($rget_servicio && $rget_servicio->num_rows > 0) {
		                    $servicio = $rget_servicio->fetch_object();
		                    $agenda_servicio_nombre = htmlspecialchars($servicio->nombre);
		                    $agenda_servicio_descripcion = htmlspecialchars($servicio->descripcion);
		                }

		                if (empty($agenda_estatus)) {
		                    $agenda_estatus = 'pendiente';
		                }

		                if ($agenda_estatus == 'aprobado') {
		                    $agenda_estatus_bg              = 'bg-success';
							$agenda_estatus_backgroundColor =  '#198754';
							$agenda_estatus_borderColor     =  '#198754';
							$agenda_estatus_textColor       =  'white';
		                } else if ($agenda_estatus == 'cancelado') {
		                    $agenda_estatus_bg              = 'bg-danger';
							$agenda_estatus_backgroundColor =  '#dc3545';
							$agenda_estatus_borderColor     =  '#dc3545';
							$agenda_estatus_textColor       =  'white';
		                } else {
		                    $agenda_estatus_bg              = 'bg-primary';
							$agenda_estatus_backgroundColor =  '#0d6efd';
							$agenda_estatus_borderColor     =  '#0d6efd';
							$agenda_estatus_textColor       =  'white';
		                }

		                $agenda_servicio_descripcion .= ' - Estatus: ' . $agenda_estatus;

		                echo '
		                {
		                    id: ' . $agenda_id . ',
		                    title: "' . $agenda_servicio_nombre . '",
		                    start: "' . $agenda_fecha_inicio . 'T' . $agenda_hora_inicio . ':00",
		                    end: "' . $agenda_fecha_fin . 'T' . $agenda_hora_fin . ':00",
		                    description: "' . $agenda_servicio_descripcion . '",
		                    location: "' . $agenda_nombre . '",
							backgroundColor: "'.$agenda_estatus_backgroundColor.'",
							borderColor: "'.$agenda_estatus_borderColor.'",
							textColor: "'.$agenda_estatus_textColor.'"
		                },';
		            }
		        }
	        ?>
	    ],
		datesSet:function(){C()}})).render(),y=FormValidation.formValidation(p,{fields:{calendar_event_name:{validators:{notEmpty:{message:"Event name is required"}}},calendar_event_start_date:{validators:{notEmpty:{message:"Start date is required"}}},calendar_event_start_date:{validators:{notEmpty:{message:"End date is required"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}}),i=flatpickr(r,{enableTime:!1,dateFormat:"Y-m-d"}),d=flatpickr(l,{enableTime:!1,dateFormat:"Y-m-d"}),c=flatpickr(s,{enableTime:!0,noCalendar:!0,dateFormat:"H:i"}),u=flatpickr(m,{enableTime:!0,noCalendar:!0,dateFormat:"H:i"}),H(),D.addEventListener("click",(e=>{C(),x={id:"",eventName:"",eventDescription:"",startDate:new Date,endDate:new Date,allDay:!1},N()})),L.addEventListener("click",(t=>{t.preventDefault(),Swal.fire({text:"Are you sure you would like to delete this event?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, delete it!",cancelButtonText:"No, return",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}}).then((function(t){t.value?(e.getEventById(x.id).remove(),w.hide()):"cancel"===t.dismiss&&Swal.fire({text:"Your event was not deleted!.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))})),b.addEventListener("click",(function(e){e.preventDefault(),Swal.fire({text:"¿Seguro que deseas cancelar?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Sí, cancelar!",cancelButtonText:"No, continuar",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}}).then((function(e){e.value?(p.reset(),v.hide()):"cancel"===e.dismiss&&Swal.fire({text:"Your form has not been cancelled!.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))})),k.addEventListener("click",(function(e){e.preventDefault(),Swal.fire({text:"¿Seguro que deseas cancelar?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Sí, cancelar!",cancelButtonText:"No, continuar",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}}).then((function(e){e.value?(p.reset(),v.hide()):"cancel"===e.dismiss&&Swal.fire({text:"Your form has not been cancelled!.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))})),(e=>{e.addEventListener("hidden.bs.modal",(e=>{y&&y.resetForm(!0)}))})(t)}}}();

KTUtil.onDOMContentLoaded((function(){KTAppCalendar.init()}));

