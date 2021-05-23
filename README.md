# alterdime
# Employee emergency app (IoT)

Overview/Usage:-
Fire Detection System are designed to discover fires early in their development when time will still be available for the safe evacuation of occupants. Early detection also plays a significant role in protecting the safety of emergency response personnel. Property loss can be reduced and downtime for the operation minimized through early detection because control efforts are started while the fire is still small. Most alarm systems provide information to emergency responders on the location of the fire, speeding the process of fire control.

To be useful, detectors must be coupled with alarms. Alarm systems provide notice to at least the building occupants and usually transmit a signal to a staffed monitoring station either on or off site. In some cases, alarms may go directly to the fire department, although in most locations this is no longer the typical approach.

These systems have numerous advantages as discussed above. The one major limitation is that they do nothing to contain or control the fire. Suppression systems such as automatic sprinklers act to control the fire. They also provide notification that they are operating, so they can fill the role of a heat detection-based system if connected to notification appliances throughout the building.

Libraries and Tools Used:-
notification panel
smtplib
encoders 
MIMEMultipart
MIMEText
import requests

Person-Detection-and-Tracking

Introduction:-
The Project is based on Person Detection and tracking and I am mainly focusing on the Person tracking, if you go through the output gif in the README.md or watch output.mp4 you will be able to see that each person will be provided with an idea as soon as he enters a frame and the number remains with his regardless of the detection happening in concurrent frames. So basically the project focuses on Person Detection and track him as long as he remains in the frame.

Overview / Usage:-
The system consist of two parts first human detection and secondly tracking. Early research is biased to human recognition rather than tracking. Monitoring the movements of human being raised the need for tracking. Monitoring movements are of high interest in determining the activities of a person and knowing the attention of person. This project focuses on Person Detection and tracking.
Identity retrieval - Tracking of human being can be used as a prior step in biometric face recognition. Keeping continuous track of person will allow to identify person at any time. Thus even if his face identification is not possible at a particular set of frames his identity can be found out. This can be very useful in the case of anomaly detection as the person's face may not face to the camera when an anomaly is detected. So with the help of tracking his identity can be revealed.
Reducing the computation power requirement - A normal objection detection algorithm just detects the Person but do not assign an Id for an Person thus has to be run in every frame to get the bounding box. Tracking will help to reduce the number of times the Detection algorithm has to be run i.e instead of running the Detection algorithm every frame we can run it once in every 5 frames.

Methodology / Approach:-
The method Proposed here is divided into 2 main parts
Person Detection - The person detection in Real-time is done with the help of Single Shot MultiBox Detector. SSD achieves 75.1% mAP, outperforming a comparable state of the art Faster R-CNN model. and the SSD model is available in the Tensorflow detection zoo. The seamless integration of SSD with tensorflow helps in further optimization and implementation of the algorithm. The SSD object detection composes of 2 parts:
Extract feature maps, and
Apply convolution filters to detect objects. Even though SSD is capable of detecting multiple objects in the frame, in this project I limited its detection to just human.
Person Tracking - Bounding box can be achieved around the object/person by running the Object Detection model in every frame, but this is computationally expensive. The tracking algorithm used here is Kalman Filtering . The Kalman Filter has long been regarded as the optimal solution to many tracking and data prediction tasks. Its use in the analysis of visual motion. The purpose of Filtering is to extract the required information from a signal, ignoring everything else. In this project the Kalman Filter is fed with the velocity, position and direction of the person which helps it to predict the future location of the Person based on his previous data.
For executing:-
Run Person_det_track.py
person_tracking.py that detects and tracks the person using SSD and Kalman Filter

Requirements:-
opencv [v3.1]
Tensorflow [v1.5.0]

Tools and libraries Used:-
cv2
import numpy as np
CentroidTracker
defaultdict
