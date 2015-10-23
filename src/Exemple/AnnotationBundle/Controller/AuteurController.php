<?php

namespace Exemple\AnnotationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Exemple\AnnotationBundle\Entity\Auteur;
use Exemple\AnnotationBundle\Form\AuteurType;

/**
 * Auteur controller.
 *
 * @Route("/auteur2")
 */
class AuteurController extends Controller
{

    /**
     * Lists all Auteur entities.
     *
     * @Route("/", name="auteur2")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExempleAnnotationBundle:Auteur')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Auteur entity.
     *
     * @Route("/", name="auteur2_create")
     * @Method("POST")
     * @Template("ExempleAnnotationBundle:Auteur:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Auteur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('auteur2_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Auteur entity.
     *
     * @param Auteur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Auteur $entity)
    {
        $form = $this->createForm(new AuteurType(), $entity, array(
            'action' => $this->generateUrl('auteur2_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Auteur entity.
     *
     * @Route("/new", name="auteur2_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Auteur();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Auteur entity.
     *
     * @Route("/{id}", name="auteur2_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExempleAnnotationBundle:Auteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Auteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Auteur entity.
     *
     * @Route("/{id}/edit", name="auteur2_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExempleAnnotationBundle:Auteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Auteur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Auteur entity.
    *
    * @param Auteur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Auteur $entity)
    {
        $form = $this->createForm(new AuteurType(), $entity, array(
            'action' => $this->generateUrl('auteur2_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Auteur entity.
     *
     * @Route("/{id}", name="auteur2_update")
     * @Method("PUT")
     * @Template("ExempleAnnotationBundle:Auteur:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExempleAnnotationBundle:Auteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Auteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('auteur2_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Auteur entity.
     *
     * @Route("/{id}", name="auteur2_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExempleAnnotationBundle:Auteur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Auteur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('auteur2'));
    }

    /**
     * Creates a form to delete a Auteur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteur2_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
