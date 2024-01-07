@extends ('admin.layout.base')

@section ('content')
    <div id="calendar"></div>

    <div class="modal" tabindex="-1" id="reservationModal" data-event-id="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail rezervace</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label fw-bold">Jméno:</label>
                        <div class="col-sm-9" data-reservation-name></div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label fw-bold">Telefon:</label>
                        <div class="col-sm-9" data-reservation-phone></div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label fw-bold">Email:</label>
                        <div class="col-sm-9" data-reservation-email></div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label fw-bold">Služba:</label>
                        <div class="col-sm-9" data-reservation-service></div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label fw-bold">Požadovaná osoba:</label>
                        <div class="col-sm-9" data-reservation-barber></div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-danger" data-button-delete>Smazat</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="detailModal" data-event-id="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail události</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">Toto je vaše soukromá událost</div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label fw-bold">Název:</label>
                        <div class="col-sm-9" data-reservation-title></div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-danger" data-button-delete>Smazat</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="createEventModal">
        <div class="modal-dialog modal-lg">
            <form method="post" action="/admin/events" data-action-ajax>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vytvořit událost</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">Toto je vaše soukromá událost</div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="date" class="col-sm-3 col-form-label fw-bold">Datum</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" name="allday" type="checkbox" value="1" id="allday"
                                           disabled autocomplete="off">
                                    <label class="form-check-label" for="allday">
                                        Celý den
                                    </label>
                                </div>
                                <input type="text" class="form-control mx-1" style="width: auto"
                                       name="date_start" id="date"
                                       disabled
                                       value=""
                                       autocomplete="off">
                                <div>až</div>
                                <input type="text" class="form-control mx-1" style="width: auto"
                                       name="date_end" id="date"
                                       disabled
                                       value=""
                                       autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="title" class="col-sm-3 col-form-label fw-bold">Název:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" autocomplete="off">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít</button>
                        <button type="submit" class="btn btn-success">Uložit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="createReservationModal">
        <div class="modal-dialog modal-lg">
            <form method="post" action="/admin/events" data-action-ajax>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vytvořit rezervaci</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3 align-items-center">
                            <label for="date" class="col-sm-3 col-form-label fw-bold">Datum</label>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" name="allday" type="checkbox" value="1" id="allday"
                                           disabled autocomplete="off">
                                    <label class="form-check-label" for="allday">
                                        Celý den
                                    </label>
                                </div>
                                <input type="text" class="form-control mx-1" style="width: auto"
                                       name="date_start" id="date"
                                       disabled
                                       value=""
                                       autocomplete="off">
                                <div>až</div>
                                <input type="text" class="form-control mx-1" style="width: auto"
                                       name="date_end" id="date"
                                       disabled
                                       value=""
                                       autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="name" class="col-sm-3 col-form-label fw-bold">Jméno:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="email" class="col-sm-3 col-form-label fw-bold">Email:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="phone" class="col-sm-3 col-form-label fw-bold">Telefon:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" id="phone" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="service" class="col-sm-3 col-form-label fw-bold">Služba:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service" id="service" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít</button>
                        <button type="submit" class="btn btn-success">Uložit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section ('css')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

        function createEvent(type, allDay, start, end) {

            let modalId = 'createReservationModal'

            if (type === 'event') {
                modalId = 'createEventModal';
            }

            let el = document.getElementById(modalId);
            let modalCreate = new bootstrap.Modal(el, {});

            el.querySelector('form').reset();

            el.querySelector('[name=date_start]').value = start;
            el.querySelector('[name=date_end]').value = end;

            if (allDay === 'true') {
                el.querySelector('[name=allday]').setAttribute('checked', 'checked');
            } else {
                el.querySelector('[name=allday]').removeAttribute('checked');
            }

            modalCreate.show();
        }


        document.addEventListener('DOMContentLoaded', function () {

            let forms = document.querySelectorAll('form[data-action-ajax]');
            for (let i = 0; i < forms.length; i++) {
                forms[i].addEventListener('submit', function (e) {
                    e.preventDefault();
                    console.log(e);
                });
            }

            let modalReservationEl = document.getElementById('reservationModal');
            let modalReservation = new bootstrap.Modal(modalReservationEl, {});

            let modalDetailEl = document.getElementById('detailModal');
            let modalDetail = new bootstrap.Modal(modalDetailEl, {});

            let calendarType = localStorage.getItem('calendar-view');

            if (!calendarType) {
                calendarType = 'dayGridMonth';
            }

            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: calendarType,
                firstDay: 1,
                locale: 'cs',
                selectable: true,
                events: '/admin/events',
                headerToolbar: {
                    start: 'dayGridMonth,timeGridWeek',
                    center: 'title',
                    end: 'prev,next'
                },
                buttonText: {
                    today: 'dnes',
                    month: 'měsíc',
                    week: 'týden',
                    day: 'den',
                    list: 'seznam'
                },
                businessHours: {
                    daysOfWeek: [1, 2, 3, 4, 5],
                    startTime: '12:00',
                    endTime: '20:00',
                },
                unselect: function (info) {

                    if (info.jsEvent.target.closest('[data-create-action]')) {
                        return;
                    }

                    let all = document.querySelectorAll('.popover');
                    for (let i = 0; i < all.length; i++) {
                        all[i].remove();
                    }
                },
                select: function (info) {

                    let all = document.querySelectorAll('.popover');
                    for (let i = 0; i < all.length; i++) {
                        all[i].remove();
                    }

                    const myDefaultAllowList = bootstrap.Tooltip.Default.allowList
                    myDefaultAllowList.button = ['data-create-allday', 'data-type', 'data-create-action', 'data-create-start', 'data-create-end'];

                    let element = info.jsEvent.target;

                    let par1 = 'false';
                    let par2 = 'null';
                    let par3 = 'null';

                    if (info.allDay) {
                        par1 = 'true';
                    }

                    if (info.startStr) {
                        par2 = info.startStr;
                    }

                    if (info.endStr) {
                        par3 = info.endStr;
                    }

                    pop = new bootstrap.Popover(element, {
                        title: 'Událost',
                        allowList: myDefaultAllowList,
                        html: true,
                        content: '<div class=my-1" ><button class="btn btn-info btn-sm" data-create-action data-create-allday="' + par1 + '" data-create-start="' + par2 + '" data-create-end="' + par3 + '" data-type="reservation">Vytvořit rezervaci</button></div><div class="my-1" ><button class="btn btn-secondary btn-sm" data-create-action data-create-allday="' + par1 + '" data-create-start="' + par2 + '" data-create-end="' + par3 + '" data-type="event">Vytvořit událost</button></div>',
                        trigger: 'manual',
                    });

                    pop.show();

                    let buttons = pop.tip.querySelectorAll('[data-create-action]');
                    for (let i = 0; i < buttons.length; i++) {
                        buttons[i].addEventListener('click', function (e) {
                            let type = e.target.getAttribute('data-type');
                            let allDay = e.target.getAttribute('data-create-allday');
                            let start = e.target.getAttribute('data-create-start');
                            let end = e.target.getAttribute('data-create-end');

                            createEvent(type, allDay, start, end);

                            let all = document.querySelectorAll('.popover');
                            for (let i = 0; i < all.length; i++) {
                                all[i].remove();
                            }
                        })
                    }
                },
                viewDidMount: function (info) {
                    localStorage.setItem('calendar-view', info.view.type);
                },
                eventClick: function (info) {
                    if (info.event.extendedProps.detail) {
                        if (info.event.extendedProps.detail.reservation) {
                            modalReservationEl.querySelector('[data-reservation-name]').innerHTML = info.event.extendedProps.detail.name;
                            modalReservationEl.querySelector('[data-reservation-email]').innerHTML = info.event.extendedProps.detail.email;
                            modalReservationEl.querySelector('[data-reservation-phone]').innerHTML = info.event.extendedProps.detail.phone;
                            modalReservationEl.querySelector('[data-reservation-service]').innerHTML = info.event.extendedProps.detail.service;
                            modalReservationEl.querySelector('[data-reservation-barber]').innerHTML = info.event.extendedProps.detail.barber;
                            modalReservationEl.setAttribute('data-event-id', info.event.extendedProps.detail.id)
                            modalReservation.show();
                        } else {
                            modalDetailEl.setAttribute('data-event-id', info.event.extendedProps.detail.id)
                            modalDetailEl.querySelector('[data-reservation-title]').innerHTML = info.event.title;
                            modalDetail.show();
                        }
                    }
                }
            });
            calendar.render();

            let deleteButtons = document.querySelectorAll('[data-button-delete]');

            for (let i = 0; i < deleteButtons.length; i++) {
                deleteButtons[i].addEventListener('click', function (e) {
                    let modal = e.target.closest('.modal');
                    let eventId = modal.getAttribute('data-event-id');
                    if (!eventId) {
                        alert('Nepovedlo se získat ID události.');
                    }

                    if (confirm('Opravdu smazat tuto událost? Operace je nevratná.')) {
                        axios.delete('/admin/events/' + eventId)
                            .then(function (response) {
                                location.reload();
                            })
                            .catch(function (error) {
                                alert('Událost se nepodařilo smazat!');
                            });
                    }
                })
            }
        });

    </script>
@endsection
