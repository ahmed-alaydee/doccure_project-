DocCure Project
Overview
DocCure هو مشروع لإدارة المواعيد الطبية بين المرضى (Users) والأطباء (Doctors). يتيح للمستخدمين تحديد مواعيد مع الأطباء، مع إمكانية حفظ البيانات الخاصة بالمرضى والأطباء في قاعدة بيانات، وعرض مواعيد المرضى والأطباء بطريقة منظمة باستخدام JSON.

Database Schema
User (Patient)
يحتوي جدول المرضى على المعلومات التالية:

image: صورة شخصية للمريض.
firstname: الاسم الأول للمريض.
lastname: الاسم الأخير للمريض.
mobile: رقم الهاتف المحمول للمريض.
blood group: فصيلة دم المريض.
address: عنوان المريض.
email: البريد الإلكتروني للمريض.
password: كلمة مرور المريض.

Doctor
يحتوي جدول الأطباء على المعلومات التالية:

image: صورة شخصية للطبيب.
username: اسم المستخدم للطبيب.
email: البريد الإلكتروني للطبيب.
phone: رقم الهاتف للطبيب.
country: بلد الطبيب.
password: كلمة مرور الطبيب.

Appointment
جدول المواعيد يحتوي على العلاقة بين المرضى والأطباء:

patient_id: ID المريض الذي تم تحديد موعد له.
doctor_id: ID الطبيب الذي تم تحديد الموعد معه.
status: حالة الموعد (مؤكد، ملغي، إلخ).
deleted_at: التاريخ والوقت الذي تم فيه حذف الموعد (في حالة الحذف باستخدام الـ soft delete).

في حاجه مهمة حابب اقول عليها ان احنا ازاي رفعنا المواعيد من غير ما نعمل جدول تالت عشان نربط الدكتور بمواعيده ضيفنا المواعيد علي هيئة json في column في ال database اسمه dates عن طريق function اسمها json_encode بس بحولها الاول ل array بعد كده ل كود json و ارفعها و لما اجي اطبعها عشان ال paitent بجيب كود ال json من الداتا بيز و احوله ل array عن طريق function json_decode و حابب اوضح طريقه ملف ال json 

[
    {
        "day": "Monday",
        "start_time": "15:00",
        "end_time": "18:00"
    },
    {
        "day": "Tuesday",
        "start_time": "09:00",
        "end_time": "12:00"
    },
    {
        "day": "Wednesday",
        "start_time": "18:00",
        "end_time": "21:00"
    }
]

و بعرض المواعيد ال ما بينهم 

و ده كل التفاصيل ال في المشروع و شكرا ليك 


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DocCure Project Overview
DocCure is a project for managing medical appointments between patients (Users) and doctors (Doctors). It allows users to schedule appointments with doctors while storing patient and doctor data in the database and displaying appointment schedules in an organized manner using JSON.

Database Schema
User (Patient)
The Patient table contains the following information:

image: Profile picture of the patient.
firstname: First name of the patient.
lastname: Last name of the patient.
mobile: Mobile phone number of the patient.
blood_group: Blood group of the patient.
address: Address of the patient.
email: Email address of the patient.
password: Password of the patient.

Doctor
The Doctor table contains the following information:

image: Profile picture of the doctor.
username: Username of the doctor.
email: Email address of the doctor.
phone: Phone number of the doctor.
country: Country of the doctor.
password: Password of the doctor.

Appointment
The Appointment table contains the relationship between patients and doctors:

patient_id: ID of the patient who has an appointment.
doctor_id: ID of the doctor with whom the appointment is scheduled.
status: Status of the appointment (e.g., confirmed, canceled, etc.).
deleted_at: Date and time when the appointment was deleted (if soft delete is used).
Key Feature - Storing Appointment Schedules in JSON
One important feature of this system is how the appointments are handled without needing an additional table to link doctors with their schedules. Instead, we store the schedules directly in the database in a column called dates, using JSON format.

We use the json_encode function to convert the schedule data into JSON. First, we convert it into an array, then encode it to JSON and store it in the database.
When we need to display the schedules for patients, we retrieve the JSON from the database and convert it back into an array using the json_decode function.
Sample JSON File Format
The schedule is stored in a JSON format like this:

json
[
    {
        "day": "Monday",
        "start_time": "15:00",
        "end_time": "18:00"
    },
    {
        "day": "Tuesday",
        "start_time": "09:00",
        "end_time": "12:00"
    },
    {
        "day": "Wednesday",
        "start_time": "18:00",
        "end_time": "21:00"
    }
]
The system allows displaying available appointment times between doctors and patients in an organized way, as shown in the example above.

Thank you for your time, and I hope this explanation helps clarify how the system works!