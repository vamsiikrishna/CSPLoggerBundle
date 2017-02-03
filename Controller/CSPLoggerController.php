<?php

namespace Sockam\CSPLoggerBundle\Controller;

use Sockam\CSPLoggerBundle\Entity\CSPReport;
use Sockam\CSPLoggerBundle\Form\CSPReportType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CSPLoggerController extends Controller
{
    public function logAction(Request $request)
    {
        $csp_report = new CSPReport();
        $form = $this->createForm(CSPReportType::class, $csp_report);
        if ($request->isMethod('POST')) {
            $data = json_decode($request->getContent(), true);
            $form->submit($data);

            if ($form->isSubmitted() && $form->isValid()) {
                $csp_report->setDocumentUri($data['csp-report']['document-uri']);
                $csp_report->setReferrer($data['csp-report']['referrer']);
                $csp_report->setBlockedUri($data['csp-report']['blocked-uri']);
                $csp_report->setViolatedDirective($data['csp-report']['violated-directive']);
                $csp_report->setOriginalPolicy($data['csp-report']['original-policy']);
                $csp_report->setDateReceived(new \DateTime());
                $csp_report->setSenderIp($request->getClientIp());
                $csp_report->setUserAgent($request->headers->get('User-Agent'));
                $em = $this->get("doctrine.orm.default_entity_manager");
                $em->persist($csp_report);
                $em->flush($csp_report);
                return new Response($csp_report->getId());
            } else {
                return new Response("OOPS");
            }

        }
    }

    public function logsAction(Request $request)
    {
        $em = $this->get("doctrine.orm.default_entity_manager");
        $logs = $em->getRepository("SockamCSPLoggerBundle:CSPReport")->findBy(array(), array('dateReceived' => 'desc'));
        return $this->render('@SockamCSPLogger/CSPLogs/logs.html.twig', array('logs' => $logs));

    }
}
