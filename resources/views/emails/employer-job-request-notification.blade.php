<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Job Request Notification</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f1ed;font-family:Arial,sans-serif;color:#1f2937;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f4f1ed;margin:0;padding:24px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:720px;background-color:#ffffff;border-radius:24px;overflow:hidden;">
                    <tr>
                        <td style="padding:0;background:linear-gradient(135deg,#111827 0%,#7f1d1d 100%);">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="padding:32px 36px;">
                                        <div style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#fecaca;font-weight:700;margin-bottom:14px;">Swift Manpower Temps Agency Ltd</div>
                                        <h1 style="margin:0 0 12px;font-size:30px;line-height:1.2;color:#ffffff;">New employer job order received</h1>
                                        <p style="margin:0;font-size:15px;line-height:1.7;color:rgba(255,255,255,0.86);">A new employer has submitted a job placement request through the website. Review the details below and follow up with the contact person.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:32px 36px 12px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#fff7f5;border:1px solid #f1ddd6;border-radius:20px;">
                                <tr>
                                    <td style="padding:24px;">
                                        <div style="font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#9f271a;margin-bottom:10px;">Request Summary</div>
                                        <div style="font-size:24px;font-weight:700;line-height:1.3;color:#111827;margin-bottom:6px;">{{ $jobRequest->company_name }}</div>
                                        <div style="font-size:15px;line-height:1.7;color:#475569;">{{ $jobRequest->position_hiring_for }} in {{ $jobRequest->job_location }}</div>
                                        <div style="margin-top:18px;">
                                            <span style="display:inline-block;background-color:#ffffff;border:1px solid #ead6cf;border-radius:999px;padding:8px 12px;font-size:12px;font-weight:700;color:#7c2d12;margin:0 8px 8px 0;">{{ $jobRequest->interest }}</span>
                                            <span style="display:inline-block;background-color:#ffffff;border:1px solid #ead6cf;border-radius:999px;padding:8px 12px;font-size:12px;font-weight:700;color:#7c2d12;margin:0 8px 8px 0;">{{ $jobRequest->specialization }}</span>
                                            <span style="display:inline-block;background-color:#ffffff;border:1px solid #ead6cf;border-radius:999px;padding:8px 12px;font-size:12px;font-weight:700;color:#7c2d12;margin:0 8px 8px 0;">{{ $jobRequest->openings_count ?: 'Openings not specified' }}</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:12px 36px 32px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="padding:0 0 18px;">
                                        <div style="font-size:20px;font-weight:700;color:#111827;">Employer details</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:separate;border-spacing:0 12px;">
                                            @php
                                                $details = [
                                                    'Subject' => $jobRequest->subject,
                                                    'Company Name' => $jobRequest->company_name,
                                                    'Website' => $jobRequest->website ?: 'Not provided',
                                                    'Industry' => $jobRequest->industry,
                                                    'Company Phone' => $jobRequest->company_phone,
                                                    'Company Address' => $jobRequest->company_address,
                                                    'Contact Person' => trim($jobRequest->contact_first_name.' '.$jobRequest->contact_last_name),
                                                    'Contact Email' => $jobRequest->email,
                                                    'Contact Phone' => $jobRequest->phone,
                                                    'Profile Link' => $jobRequest->profile_link ?: 'Not provided',
                                                    'Service Needed' => $jobRequest->interest,
                                                    'Specialization' => $jobRequest->specialization,
                                                    'Job Location' => $jobRequest->job_location,
                                                    'Pay Rate Range' => $jobRequest->pay_rate ?: 'Not provided',
                                                    'Position Hiring For' => $jobRequest->position_hiring_for,
                                                    'Preferred Pronoun' => $jobRequest->preferred_pronoun ?: 'Not provided',
                                                    'Number of Openings' => $jobRequest->openings_count ?: 'Not provided',
                                                ];
                                            @endphp

                                            @foreach ($details as $label => $value)
                                                <tr>
                                                    <td style="width:220px;padding:14px 16px;background-color:#f8fafc;border:1px solid #e2e8f0;border-radius:14px 0 0 14px;font-size:13px;font-weight:700;color:#475569;">{{ $label }}</td>
                                                    <td style="padding:14px 16px;background-color:#ffffff;border:1px solid #e2e8f0;border-left:0;border-radius:0 14px 14px 0;font-size:14px;line-height:1.6;color:#111827;">{{ $value }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 36px 36px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#111827;border-radius:20px;">
                                <tr>
                                    <td style="padding:24px 24px 18px;">
                                        <div style="font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#fca5a5;margin-bottom:10px;">Job Details</div>
                                        <div style="font-size:15px;line-height:1.8;color:#e5e7eb;">{{ $jobRequest->message ?: 'No additional job details were provided by the employer.' }}</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 36px 36px;">
                            <p style="margin:0;font-size:13px;line-height:1.7;color:#64748b;">This notification was generated automatically from the website employer job order form. You can reply directly to this email to contact {{ trim($jobRequest->contact_first_name.' '.$jobRequest->contact_last_name) }}.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
